<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class UsersController extends Controller{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }
   
    public function logOut(){
        if(isset($_POST['logout'])){
            var_dump(($_SESSION['dir']));
            var_dump($_POST['logout']);
            $dir = $_SESSION['dir'];
            session_destroy();
            var_dump($_SESSION);
        }
           
    }
    public function run()
    {
        include $_SESSION['dir'];    
    }

}
