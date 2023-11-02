<?php 

require_once $_SESSION['dir']. '/Controller/Controller.php';
require_once $_SESSION['dir']. '/Modele/UsersManager.php';
class UsersController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function verifpseudo(){
            if(isset($_POST['pseudo'])){
                $users = $this->manager->verifpseudo($_POST['pseudo']);
                return $users;
            }
        
    }
    public function run(){
        include $_SESSION['dir']. '/View/usersView.php';
    }

}

$controller = new UsersController();
$users = $controller->verifpseudo();
include ($_SESSION['dir']. '/View/usersView.php');
?>
