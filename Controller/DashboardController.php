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
        elseif (isset($_POST['modifyUser']) && isset($_POST['radioUsers'])){
            $user =  $_POST['radioUsers'] ;
             
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';       
        }
        elseif(isset($_POST['denyUser'])&& isset($_POST['radioUsers'])){
            $user  = $_POST['radioUsers'] ;
            $this->manager->deleteUser($user);

            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';  
        }
        elseif (isset($_POST['validateRecipe']) && isset($_POST['checkboxesRecipe'])){
            foreach($_POST['checkboxesRecipe'] as $recette){
                $this->manager->acceptRecipe($recette);
            }    
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';       
        }
        elseif(isset($_POST['denyRecipe']) && isset($_POST['checkboxesRecipe'])){
            foreach($_POST['checkboxesRecipe'] as $recette){
                $this->manager->denyRecipe($recette);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';  
        }
        else{
            $_SESSION['allUsers'] = $this->manager->getAllUsers();
            $_SESSION['recipesToAccept'] = $this->manager->getRecipesToAccept();
        }
        include $_SESSION['dir'] . '/View/DashboardView.php';
        
    }
}
