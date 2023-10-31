<?php 

require_once 'Controller.php';
require_once 'Modele/UsersManager.php';
class UsersController extends Controller{

    public function __construct() {
        $this->manager = new UsersManager();
    }

    public function run(){
        include '../View/usersView.php';
    }
}

?>