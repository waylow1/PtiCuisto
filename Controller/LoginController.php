<?php 

require_once $_SESSION['dir']. '/Controller/Controller.php';
require_once $_SESSION['dir']. '/Modele/UsersManager.php';
class LoginController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function run(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->manager = new UsersManager();
            $verif = $this->manager->verifInformations($_POST['username'],$_POST['password']);
            if(isset($verif)){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
               
                $_SESSION['type'] = $verif[0]["UST_ID"];
                include $_SESSION['dir']. '/View/ProfileView.php';

            }
        }
        else{
            include $_SESSION['dir']. '/View/LoginView.php';
        }
    }
   
}
