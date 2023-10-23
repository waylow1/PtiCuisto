<?php 

class UsersManager extends Manager{
    public function getAllUsers(){
        $conn = $this->con();
        $reponse = $conn->prepare('SELECT * from USERS');
        return $reponse;
    }

    public function verifPseudo($pseudo){
        $conn = $this->con();
        $reponse = $conn->prepare('SELECT * from USERS where US_PSEUDO = "' . $pseudo . '"');
        if($reponse != null){
            return true;
        }
        return false;

    }

}
?>