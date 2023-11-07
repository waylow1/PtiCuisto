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
        include $dir;
        print_r($_SESSION);
    }
    public function run()
    {
        include $_SESSION['dir'];    
    }

    public function modifEdito(){
        if($_SESSION['type'] = 1 ){       
            include $_SESSION['dir'] . '/View/EditoView.php';     
        }
    }
}
