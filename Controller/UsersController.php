<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class UsersController extends Controller{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }
   
    public function logOut(){
        $dir = $_SESSION['dir'];
        session_destroy();
        session_start();
        $_SESSION['dir'] = $dir;
    }
    public function run()
    {
        include $_SESSION['dir'];    }
}
