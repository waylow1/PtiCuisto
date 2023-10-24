<<<<<<< HEAD
<?php 
=======
<?php
require_once 'Manager.php';
>>>>>>> main

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
        $reponse = $db->prepare('SELECT * from USERS where US_PSEUDO = "' . $pseudo . '"');
        if($reponse != null){
            return true;
        }
        return false;

    }

}
?>