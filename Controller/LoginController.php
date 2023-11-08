<?php 

require_once $_SESSION['dir']. '/Controller/Controller.php';
require_once $_SESSION['dir']. '/Modele/UsersManager.php';
class LoginController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function run(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']))  {
            $verif = $this->manager->verifInformations($_POST['username'],$_POST['password']);
            if(!(is_null($verif[0]))){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['current_user_informations'] = $verif[0];
                $_SESSION['type'] = $verif[0]["UST_ID"];
                $_GET['action'] ='Profile';
                header('Location: ' . $_SESSION['dir']);
            }
            else{
                echo '<script> alert ("Pseudo ou mot de passe incorrect") </script>';
                include $_SESSION['dir']. '/View/LoginView.php';
            }
        }
        else{
            include $_SESSION['dir']. '/View/LoginView.php';
        }
    }
   
}
