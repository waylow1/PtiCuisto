<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class UsersController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
        $_SESSION['current_user_info'] = $this->manager->verifInformations($_SESSION['username'], $_SESSION['password']);;
    }
   
    public function logOut(){
        $this->manager->logOut();
    }

    public function run(){
        include $_SESSION['dir'];
    }
}
