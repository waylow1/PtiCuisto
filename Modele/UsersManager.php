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




}
