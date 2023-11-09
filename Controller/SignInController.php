<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class SignInController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }


        public function run()
    {
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $temp = $this->manager->selectMaxID();
        $var = $temp[0]['max'] +1;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pseudo'], $_POST['password1'], $_POST['password2'], $_POST['mail'],$_POST['firstname'], $_POST['lastname']))  {
            if($_POST['password1'] == $_POST['password2']){
                if ($_POST['password1']==$_POST['password2']){
                    $insert= $this->manager->insertUser($var, $_POST['pseudo'], password_hash($_POST['password2'], PASSWORD_DEFAULT), $_POST['mail'],$_POST['firstname'], $_POST['lastname']);
                    if(isset($insert)){
                        $_GET['action']='Profile';
                        header('Location :'.$_SESSION['dir']);
                    }
                }
            }
            else{
                echo '<script> alert ("mot de passe incorrect") </script>';
                include $_SESSION['dir']. '/View/SignInView.php';
            }
        }
        include $_SESSION['dir'] . '/View/SignInView.php'; 
     }
        
}
