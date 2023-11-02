<?php 

require_once $_SESSION['dir']. '/Controller/Controller.php';
require_once $_SESSION['dir']. '/Modele/UsersManager.php';
class UsersController extends Controller{

    public function __construct() {
        $this->manager = new UsersManager();
    }

    public function run(){
        include $_SESSION['dir']. '/View/usersView.php';
    }

    function login() {
        include $_SESSION['dir']. '/View/loginView.php';
    }

    function signin() {
        include $_SESSION['dir']. '/View/signinView.php';
    }

    function profile() {
        include $_SESSION['dir']. '/View/profileView.php';
    }
}

?>