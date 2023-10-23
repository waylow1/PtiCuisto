<?php
require_once 'Manager.php';

class UsersManager extends Manager{
    
    public function getUsers(){
        $db = $this->con();
   }

}


?>