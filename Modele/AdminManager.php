<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class AdminManager extends Manager
{
    // Function to retrieve all users
    public function getAllUsers()
    {
        $db = $this->con();
        $users = $db->prepare('SELECT * from USERS');
        $users->execute();
        $res = $users->fetchall();
        return $res;
    }

    // Function to get recipes associated with a specific user
    public function getRecipesOfUser($us_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->query("SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO 
        from RECIPE 
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where US_ID='$us_id'");
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to log out a user
    public function logOut()
    {
        session_destroy($_SESSION['username'], $_SESSION['password'], $_SESSION['type']);
    }

    // Function to delete a user by marking them as deleted (USS_JD = 2)
    public function deleteUser($us_id)
    {
        $connexion = $this->con();
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_ID like :id ');
        $req->bindParam('id', $us_id);
        $req->execute();
    }

    // Function to get recipes that need to be accepted by administrators
    public function getRecipesToAccept()
    {
        $connexion = $this->con();
        $recipes = $connexion->prepare('SELECT RE_ID, RES_ID, US_PSEUDO, CA_TITLE, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_REGDATE 
        from RECIPE 
        join USERS using(US_ID) 
        join CATEGORY using(ca_id)
        where RES_ID = 1');
        $recipes->execute();
        $res = $recipes->fetchAll();
        return $res;
    }

    // Function to accept a recipe (change its status to RES_ID = 2)
    public function acceptRecipe($re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RES_ID = 2 where RE_ID like :re_id');
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();
    }

    // Function to deny and delete a recipe
    public function denyRecipe($re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare('DELETE FROM RECIPE where RE_ID like :re_id');
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();
    }

    // Function to get user information by ID
    public function getUser($us_id)
    {
        $connexion = $this->con();
        $user = $connexion->prepare('SELECT * FROM USERS  WHERE US_ID like :us_id');
        $user->bindParam('us_id', $us_id);
        $user->execute();
        $res = $user->fetchAll();
        return $res;
    }

    // Functions to modify user properties by ID
     // Function to update the UST_ID (user status) of a user
     public function userModifyUstId($ust_id, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET UST_ID = :ust_id where US_ID like :us_id');
         $recipe->bindParam('ust_id', $ust_id);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }
 
     // Function to update the USS_JD (user deletion status) of a user
     public function userModifyUssJd($uss_jd, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET USS_JD = :uss_jd where US_ID like :us_id');
         $recipe->bindParam('uss_jd', $uss_jd);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }
 
     // Function to update the US_PSEUDO (user username) of a user
     public function userModifyUsPseudo($us_pseudo, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET US_PSEUDO = :us_pseudo where US_ID like :us_id');
         $recipe->bindParam('us_pseudo', $us_pseudo);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }
 
     // Function to update the US_MAIL (user email) of a user
     public function userModifyUsMail($us_mail, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET US_MAIL = :us_mail where US_ID like :us_id');
         $recipe->bindParam('us_mail', $us_mail);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }
 
     // Function to update the US_FIRSTNAME (user first name) of a user
     public function userModifyUsFirstName($us_firstname, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET US_FIRSTNAME = :us_firstname where US_ID like :us_id');
         $recipe->bindParam('us_firstname', $us_firstname);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }
 
     // Function to update the US_LASTNAME (user last name) of a user
     public function userModifyUsLastName($us_lastname, $us_id)
     {
         $connexion = $this->con();
         $recipe = $connexion->prepare('UPDATE USERS SET US_LASTNAME = :us_lastname where US_ID like :us_id');
         $recipe->bindParam('us_lastname', $us_lastname);
         $recipe->bindParam('us_id', $us_id);
         $recipe->execute();
     }

    // Function to retrieve all recipes (RES_ID = 2)
    public function getAllRecipes()
    {
        $connexion = $this->con();
        $recipes = $connexion->query('SELECT RE_ID, RES_ID, RE_REGDATE, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO
        from RECIPE
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where RES_ID=2');
        $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to get details of a specific recipe by ID
    public function getRecipe($re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare('SELECT RE_ID, RES_ID, RE_TITLE, CA_ID, CA_TITLE, RE_SUMMARY, RE_CONTENT FROM RECIPE
        JOIN CATEGORY USING (CA_ID)
        WHERE RE_ID like :re_id');
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();
        $recipeID = $recipe->fetchAll();
        return $recipeID;
    }

    // Function to modify the title of a recipe
    public function recipeModifyReTitle($re_title, $re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare("UPDATE RECIPE SET RE_TITLE = :re_title where re_id like :re_id");
        $recipe->bindParam('re_title', $re_title);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // After modifying, change the recipe status to "pending" (RES_ID = 1)
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify the category of a recipe
    public function recipeModifyCaTitle($ca_title, $re_id)
    {
        $connexion = $this->con();

        // Retrieve the category ID based on the provided category title
        $category = $connexion->prepare('SELECT CA_ID FROM CATEGORY WHERE CA_TITLE like :ca_title');
        $category->bindParam('ca_title', $ca_title);
        $category->execute();
        $ca_id = $category->fetchAll();

        // Update the recipe's category based on the category ID
        $recipe = $connexion->prepare('UPDATE RECIPE SET CA_ID = :ca_id  where re_id like :re_id');
        $recipe->bindParam('ca_id', $ca_id[0]['CA_ID']);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // After modifying, change the recipe status to "pending" (RES_ID = 1)
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify the summary of a recipe
    public function recipeModifyReSummary($re_summary, $re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_SUMMARY = :re_summary where re_id like :re_id');
        $recipe->bindParam('re_summary', $re_summary);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // After modifying, change the recipe status to "pending" (RES_ID = 1)
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }

    // Function to modify the content of a recipe
    public function recipeModifyReContent($re_content, $re_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_CONTENT = :re_content  where re_id like :re_id');
        $recipe->bindParam('re_content', $re_content);
        $recipe->bindParam('re_id', $re_id);
        $recipe->execute();

        // After modifying, change the recipe status to "pending" (RES_ID = 1)
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id', $re_id);
        $recipe2->execute();
    }
}

?>
