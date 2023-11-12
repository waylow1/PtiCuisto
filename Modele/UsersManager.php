<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class UsersManager extends Manager
{
    // Function to verify user login credentials
    public function verifInformations($pseudo, $password)
    {
        $db = $this->con();
        // Prepare a SQL query to select a user based on provided username, password, and a condition
        $reponse = $db->prepare('SELECT * FROM USERS WHERE US_PSEUDO = ? AND US_PASSWORD = ? AND USS_JD <> 2');
        $reponse->bindParam(1, $pseudo);
        $reponse->bindParam(2, $password);
        $reponse->execute();
        $res = $reponse->fetchAll();
        // Return the results if found, otherwise, return null
        if (isset($res)) {
            return $res;
        }
    }

    // Function to get recipes associated with a specific user
    public function getRecipesOfUser($us_pseudo)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve recipes associated with the specified user
        $recipe = $connexion->query("SELECT * FROM RECIPE JOIN CATEGORY USING (CA_ID) JOIN USERS USING (US_ID) WHERE US_PSEUDO = '$us_pseudo'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve the user's password
    public function selectPass($pseudo)
    {
        $db = $this->con();
        // Prepare a SQL query to select the user's password based on the username
        $reponse = $db->prepare('SELECT US_PASSWORD FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchAll();
        return $res;
    }

    // Function to check if a username exists
    public function selectPseudo($pseudo)
    {
        $db = $this->con();
        // Prepare a SQL query to check if the provided username exists
        $reponse = $db->prepare('SELECT US_PSEUDO FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchAll();
        return $res;
    }

    // Function to insert a new user into the database
    public function insertUser($max, $pseudo, $password, $mail, $firstname, $lastname)
    {
        $db = $this->con();    
        // Prepare an SQL query to insert a new user into the USERS table
        $reponse = $db->prepare('INSERT INTO `USERS`(`US_ID`, `UST_ID`, `USS_JD`, `US_PSEUDO`, `US_MAIL`, `US_FIRSTNAME`, `US_LASTNAME`, `US_REGDATE`, `US_PASSWORD`) VALUES (:max, 2, 1, :pseudo, :mail, :firstname, :lastname, NOW(), :password);');
        $reponse->bindParam(':max', $max);
        $reponse->bindParam(':pseudo', $pseudo);
        $reponse->bindParam(':mail', $mail);
        $reponse->bindParam(':firstname', $firstname);
        $reponse->bindParam(':lastname', $lastname);
        $reponse->bindParam(':password', $password);
        $reponse->execute();
    }

    // Function to select the maximum user ID
    public function selectMaxID()
    {
        $db = $this->con();
        // Prepare a SQL query to retrieve the maximum user ID
        $reponse = $db->prepare('SELECT max(US_ID) as max FROM USERS');
        $reponse->execute();
        $res = $reponse->fetchAll();
        return $res;
    }

    // Function to log out the current user by destroying the session
    public function logOut()
    {
        // Destroy the session data
        session_destroy($_SESSION['username'], $_SESSION['password'], $_SESSION['type']);
    }

    // Function to get the user ID of the currently logged-in user
    public function getCurrentUserID()
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve the user ID based on the provided username
        $user = $connexion->prepare('SELECT US_ID FROM USERS WHERE US_PSEUDO LIKE :name');
        $user->bindParam('name', $_POST['userName']);
        $user->execute();
        $userID = $user->fetchAll();
        return $userID;
    }

    // Function to "soft" delete a user (mark them as inactive)
    public function deleteUser()
    {
        $connexion = $this->con();
        // Prepare a SQL query to mark a user as inactive based on their username and password
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_PSEUDO LIKE :pseudo AND US_PASSWORD LIKE :password');
        $req->bindParam('pseudo', $_SESSION['username']);
        $req->bindParam('password', $_SESSION['password']);
        $req->execute();
    }

    // Function to change the user's password
    public function changePassword($newPassword)
    {
        $db = $this->con();
        // Prepare a SQL query to update the user's password
        $req = $db->prepare('UPDATE USERS SET US_PASSWORD = ? WHERE US_PSEUDO = ?');
        $password = password_hash($newPassword, PASSWORD_DEFAULT);
        $req->bindParam(1, $password);
        $req->bindParam(2, $_SESSION['username']);
        $req->execute();
    }

    // Function to delete a recipe by its ID
    public function deleteRecipe($re_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to delete a recipe based on its ID
        $recipe = $connexion->prepare('DELETE FROM RECIPE WHERE RE_ID LIKE :re_id');
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();
    }

    // Function to modify a recipe's title
    public function recipeModifyReTitle($re_title, $re_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to update a recipe's title based on its ID
        $recipe = $connexion->prepare("UPDATE RECIPE SET RE_TITLE = :re_title WHERE RE_ID LIKE :re_id");
        $recipe->bindParam('re_title', $re_title);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute(); 
        // Set the recipe's status to 1
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1 WHERE RE_ID LIKE :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify a recipe's category title
    public function recipeModifyCaTitle($ca_title, $re_id)
    {
        $connexion = $this->con();
        // Retrieve the category ID for the given category title
        $category = $connexion->prepare('SELECT CA_ID FROM CATEGORY WHERE CA_TITLE LIKE :ca_title');
        $category->bindParam('ca_title', $ca_title);
        $category->execute();
        $ca_id = $category->fetchAll();

        // Update the recipe's category based on the category ID
        $recipe = $connexion->prepare('UPDATE RECIPE SET CA_ID = :ca_id WHERE RE_ID LIKE :re_id');
        $recipe->bindParam('ca_id', $ca_id[0]['CA_ID']); 
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // Set the recipe's status to 1
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1 WHERE RE_ID LIKE :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify a recipe's summary
    public function recipeModifyReSummary($re_summary, $re_id)
    {
        $connexion = $this->con();
        // Update the recipe's summary based on its ID
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_SUMMARY = :re_summary WHERE RE_ID LIKE :re_id');
        $recipe->bindParam('re_summary', $re_summary);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // Set the recipe's status to 1
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1 WHERE RE_ID LIKE :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify a recipe's content
    public function recipeModifyReContent($re_content, $re_id)
    {
        $connexion = $this->con();
        // Update the recipe's content based on its ID
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_CONTENT = :re_content WHERE RE_ID LIKE :re_id');
        $recipe->bindParam('re_content', $re_content);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // Set the recipe's status to 1
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1 WHERE RE_ID LIKE :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to get details of a specific recipe by its ID
    public function getRecipe($re_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve details of a recipe based on its ID
        $recipe = $connexion->prepare('SELECT RE_ID, RES_ID, RE_TITLE, CA_ID, CA_TITLE, RE_SUMMARY, RE_CONTENT FROM RECIPE JOIN CATEGORY USING (CA_ID) WHERE RE_ID LIKE :re_id');
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();
        $recipeID = $recipe->fetchAll();
        return $recipeID;
    }
      
}
?>