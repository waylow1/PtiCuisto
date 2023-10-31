<?php

require_once $_SESSION['dir'].'/Modele/Manager.php';

class UsersManager extends Manager{
    public function getUsers(){
        $db = $this->con();
   }
}


?>