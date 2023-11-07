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

    public function insertUser($pseudo, $password, $mail, $firstname, $lastname){
        $db = $this->con();
        $reponse = $db->prepare("insert into USERS values('2','2','" . $pseudo . "', '" .$mail ."', '" . $firstname . "', '" . $lastname . "', sysdate, '" . $password . "'");
        $reponse->execute();
    }

    public function selectMaxID(){
        $db = $this->con();
        $reponse = $db->prepare('select max(US_ID) from USERS');
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }
    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }




}
