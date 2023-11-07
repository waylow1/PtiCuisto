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
        echo $this->manager->selectMaxID();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo'], $_POST['password2'], $_POST['mail'],$_POST['firstname'], $_POST['lastname']))  {
            $this->manager = new UsersManager();
            $insert= $this->manager->insertUser($_POST['pseudo'], $_POST['password2'], $_POST['mail'],$_POST['firstname'], $_POST['lastname']);
            if(isset($insert)){
                include $_SESSION['dir']. '/View/ProfileView.php';
            }
            
        }
        include $_SESSION['dir'] . '/View/SignInView.php'; 
     }
        
}
