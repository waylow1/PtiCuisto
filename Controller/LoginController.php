<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class LoginController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }
    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $verifPassword = $this->manager->selectPass($_POST['password']);
            $verifPseudo = $this->manager->selectPseudo($_POST['username']);
            if(!(empty($verifPassword)) && password_verify($_POST['password'], $verifPassword[0]['US_PASSWORD'])){
                $verif = $this->manager->verifInformations($_POST['username'],$verifPassword[0]['US_PASSWORD']);
                if(!(empty($verif))){
                    if (!(is_null($verif[0]))) {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['password'] = $_POST['password'];

                        $_SESSION['current_user_informations'] = $verif[0];

                        $_GET['action'] = "";
                        echo '<script>window.location.href = "index.php";</script>';
                    }
                } else {
                    echo '<script> alert ("Pseudo ou mot de passe incorrect") </script>';
                    include $_SESSION['dir'] . '/View/LoginView.php';
                }
            } else{
                echo '<script> alert ("mot de passe incorrect ou le pseudo existe déjà") </script>';
                    include $_SESSION['dir'] . '/View/LoginView.php';
            }  
        } else {
            include $_SESSION['dir'] . '/View/LoginView.php';
        }
    }
}
