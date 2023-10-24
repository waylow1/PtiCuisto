<?php
require_once '../Manager/UsersManager.php';
require_once 'Controller.php';
class UsersController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function verifpseudo(){
        $count = 0;
        var_dump($this->manager) ;
            if(isset($_POST['pseudo'])){
                $this->manager->getAllUsers();
            
            }
        
    }
   
}


$controller = new UsersController();
$controller->verifpseudo();
include('../View/usersView.php');
?>
