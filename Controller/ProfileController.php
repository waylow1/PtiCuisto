<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
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
        } elseif (isset($_POST['suppression'])) {

            if (isset($_COOKIE['confirm'])) {

                if ($_COOKIE['confirm'] == 'true') {
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
        } elseif (isset($_POST['deleteRecipe']) && isset($_POST['radioRecipes'])) {
            $recipe  = $_POST['radioRecipes'][0];
            $this->manager->deleteRecipe($recipe);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['modifyRecipe']) && isset($_POST['radioRecipes'])) {

            $recipe = $_POST['radioRecipes'][0];
            $_SESSION['radioRecipes'] = $this->manager->getRecipe($recipe);
            
            echo '<script>window.location.href = "?action=ModifyRecipe";</script>';
        }
        else{  
            $_SESSION['current_user_recipes'] = $this->manager->getRecipesOfUser($_SESSION['username']);
            include $_SESSION['dir'] . '/View/ProfileView.php';
        }}
      
}
?>