<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class UsersManager extends Manager
{
    public function verifInformations($pseudo, $password)
    {
        $db = $this->con();
        $reponse = $db->prepare('SELECT * from USERS where US_PSEUDO = ? and US_PASSWORD = ? and USS_JD <> 2');
        $reponse->bindParam(1, $pseudo);
        $reponse->bindParam(2, $password);
        $reponse->execute();
        $res = $reponse->fetchall();
        if (isset($res)) {
            return $res;
        }
    }
    public function getRecipesOfUser($us_pseudo)
    {
        $connexion = $this->con();
        $recipe = $connexion->query("SELECT * 
        from RECIPE 
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where US_PSEUDO ='$us_pseudo'");
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } 

    public function selectPass($pseudo){
        $db = $this->con();
        $reponse = $db->prepare('SELECT US_PASSWORD FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    public function selectPseudo($pseudo){
        $db = $this->con();
        $reponse = $db->prepare('SELECT US_PSEUDO FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    public function insertUser($max, $pseudo, $password, $mail, $firstname, $lastname){
        $db = $this->con();    
        $reponse = $db->prepare('INSERT INTO `USERS`(`US_ID`, `UST_ID`, `USS_JD`, `US_PSEUDO`, `US_MAIL`, `US_FIRSTNAME`, `US_LASTNAME`, `US_REGDATE`, `US_PASSWORD`) VALUES (:max, 2, 1, :pseudo, :mail, :firstname, :lastname, NOW(), :password);');
        $reponse->bindParam(':max', $max);
        $reponse->bindParam(':pseudo', $pseudo);
        $reponse->bindParam(':mail', $mail);
        $reponse->bindParam(':firstname', $firstname);
        $reponse->bindParam(':lastname', $lastname);
        $reponse->bindParam(':password', $password);
        $reponse->execute();
    }

    public function selectMaxID(){
        $db = $this->con();
        $reponse = $db->prepare('select max(US_ID) as max from USERS');
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }

    public function getCurrentUserID()
    {
        $connexion = $this->con();
        $user = $connexion->prepare('SELECT US_ID from USERS where US_PSEUDO like :name');
        $user->bindParam('name', $_POST['userName']);
        $user->execute();
        $userID = $user->fetchall();
        return $userID;
    }

    public function deleteUser() {
        $connexion = $this->con();
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_PSEUDO like :pseudo AND US_PASSWORD like :password');
        $req->bindParam('pseudo', $_SESSION['username']);
        $req->bindParam('password', $_SESSION['password']);
        $req->execute();
    }
    

    public function changePassword($newPassword) {
        $db = $this->con();
       
        $req = $db->prepare('UPDATE USERS SET US_PASSWORD = ? WHERE US_PSEUDO = ?');
        $password = password_hash($newPassword,PASSWORD_DEFAULT);
        $req->bindParam(1, $password);
        $req->bindParam(2, $_SESSION['username']);
        $req->execute();
    }

    public function deleteRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('DELETE FROM RECIPE where RE_ID like :re_id');
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
    }

    public function recipeModifyReTitle($re_title,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare("UPDATE RECIPE SET RE_TITLE = :re_title where re_id like :re_id" );
        $recipe->bindParam('re_title',$re_title);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute(); 
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyCaTitle($ca_title,$re_id){
        
        $connexion = $this->con();
        $category = $connexion->prepare('SELECT CA_ID FROM CATEGORY WHERE CA_TITLE like :ca_title');
        $category->bindParam('ca_title',$ca_title);
        $category->execute();
        $ca_id = $category->fetchAll();
        $recipe = $connexion->prepare('UPDATE RECIPE SET CA_ID = :ca_id  where re_id like :re_id' );
        $recipe->bindParam('ca_title',$ca_id[0]['CA_ID']); 
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyReSummary($re_summary,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_SUMMARY = :re_summary where re_id like :re_id' );
        $recipe->bindParam('re_summary',$re_summary);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyReContent($re_content,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_CONTENT = :re_content  where re_id like :re_id' );
        $recipe->bindParam('re_content',$re_content);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }

    public function getRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('SELECT RE_ID,RES_ID,RE_TITLE,CA_ID,CA_TITLE,RE_SUMMARY,RE_CONTENT FROM RECIPE
        JOIN CATEGORY USING (CA_ID)
        WHERE RE_ID like :re_id');
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipeID = $recipe->fetchAll();
        return $recipeID;
    }
   
}
?>