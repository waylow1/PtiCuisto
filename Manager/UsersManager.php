<?php 

class UsersManager{
    public function getAllUsers(){
        require '../Connection/connection.php';
        $reponse = $conn->prepare('SELECT * from USERS');
        return $reponse;
    }
    public function getUsersByID($userID){
        require '../Connection/connection.php';
        $reponse = $conn->prepare('SELECT * from USERS where US_ID = "' . $userID . '"');
        return $reponse;
    }

}
?>