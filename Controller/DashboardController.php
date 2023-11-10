<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/AdminManager.php';
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->manager = new AdminManager();
    }

    public function run()
    {   
        if (isset($_POST['logout'])) {
            $dir = $_SESSION['dir'];
            session_destroy();
            session_start();
            $_SESSION['dir'] = $dir;
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        }
        elseif (isset($_POST['suppression'])) {
            
            if(isset($_COOKIE['confirm'])){
              
                if($_COOKIE['confirm'] == 'true') {
                    $this->manager->deleteUser();
                    $dir = $_SESSION['dir'];
                    session_destroy();
                    session_start();
                    echo '<script> alert("Votre compte a bien été supprimé")</script>';
                    $_SESSION['dir'] = $dir;
                    $_GET['action'] = '';
                    echo '<script>window.location.href = "index.php";</script>';
                }
            }
            
        }
        elseif (isset($_POST['validateRecipe'])){
            
            for($i = 0; $i<$_POST['validateRecipe'];$i++){
                echo $_POST['validateRecipe'][$i]['RE_ID'];
                $this->manager->acceptRecipe($_POST['validateRecipe'][$i]['RE_ID']);
            }
            
        }
        elseif(isset($_POST['denyRecipe'])){
        }
        else{
            $_SESSION['allUsers'] = $this->manager->getAllUsers();
            $_SESSION['recipesToAccept'] = $this->manager->getRecipesToAccept();
        }
        include $_SESSION['dir'] . '/View/DashboardView.php';
    }
}
