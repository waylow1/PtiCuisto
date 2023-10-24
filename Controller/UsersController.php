<?php
require_once '../Modele/UsersManager.php';
require_once 'Controller.php';
class UsersController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function verifpseudo(){
        $count = 0;
            if(isset($_POST['pseudo'])){
                $users = $this->manager->getAllUsers();
                return $users;
            }
        
    }
   
}


$controller = new UsersController();
$users = $controller->verifpseudo();
include('../View/usersView.php');
?>
