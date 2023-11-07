<?php

require_once $_SESSION['dir'].'/Modele/Manager.php';

class UsersManager extends Manager{
    public function getAllUsers(){
        $db = $this->con();
        $users = $db->prepare('SELECT * from USERS');
        $users->execute();
        $res = $users->fetchall();
        return $res;
    }

    public function verifInformations($pseudo,$password){
        $db = $this->con();
        $reponse = $db->prepare('SELECT * from USERS where US_PSEUDO = ? and US_PASSWORD = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->bindParam(2,$password);
        $reponse->execute();
        $res = $reponse->fetchall();
        if(isset($res)){
            return $res;
        }
    } 
    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }

    public function getRecipesOfUser($us_id){
        $connexion = $this->con();
        $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
        from RECIPE 
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where US_ID='$us_id'");
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
     }

    public function getCurrentUserID() {
        $connexion = $this->con();
        $user = $connexion->prepare('SELECT US_ID from USERS where US_PSEUDO like :name');
        $user->bindParam('name', $_POST['userName']);
        $user->execute();
        $userID = $user->fetchall();
        return $userID;
    }
}
