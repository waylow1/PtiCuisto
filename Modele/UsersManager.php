<?php
require_once 'Manager.php';

class UsersManager extends Manager{
    public function getAllUsers(){
        $db = $this->con();
        $users = $db->prepare('SELECT * from USERS');
        $users->execute();
        $res = $users->fetchall();
        return $res;
    }

    public function verifPseudo($pseudo){
        $db = $this->con();
        $reponse = $db->prepare('SELECT * from USERS where US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchall();
        $count = count($res);
        return $count;
      

    }

}
?>
