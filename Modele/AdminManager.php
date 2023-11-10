<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class AdminManager extends Manager
{
    public function getAllUsers()
    {
        $db = $this->con();
        $users = $db->prepare('SELECT * from USERS');
        $users->execute();
        $res = $users->fetchall();
        return $res;
    }

    public function getRecipesOfUser($us_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
        from RECIPE 
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where US_ID='$us_id'");
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } 

    
    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }


    public function deleteUser() {
        $connexion = $this->con();
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_PSEUDO like :pseudo AND US_PASSWORD like :password');
        $req->bindParam('pseudo', $_SESSION['username']);
        $req->bindParam('password', $_SESSION['password']);
        $req->execute();
    }
    public function getRecipesToAccept(){
        $connexion = $this->con();
        $recipes = $connexion->prepare('SELECT RE_ID,RES_ID,US_PSEUDO,CA_TITLE,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_REGDATE 
        from RECIPE 
        join USERS using(US_ID) 
        join CATEGORY using(ca_id)
        where RES_ID = 1');
        $recipes->execute();
        $res = $recipes->fetchall();
        return $res;
    }

    public function acceptRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RES_ID = 2 where RE_ID like :re_id' );
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
    }

    public function denyRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('DELETE FROM RECIPE where RE_ID like :re_id');
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
    }
}
