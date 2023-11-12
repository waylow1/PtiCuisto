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
        } elseif (isset($_POST['modifyUser']) && isset($_POST['radioUsers'])) {

            $user = $_POST['radioUsers'];

            $_SESSION['radioUsers'] = $this->manager->getUser($user);

            echo '<script>window.location.href = "?action=ModifyUser";</script>';
        } elseif (isset($_POST['denyUser']) && isset($_POST['radioUsers'])) {
            $user  = $_POST['radioUsers'];
            $this->manager->deleteUser($user);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['validateRecipe']) && isset($_POST['checkboxesRecipe'])) {
            foreach ($_POST['checkboxesRecipe'] as $recette) {
                $this->manager->acceptRecipe($recette);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['denyRecipe']) && isset($_POST['checkboxesRecipe'])) {
            foreach ($_POST['checkboxesRecipe'] as $recette) {
                $this->manager->denyRecipe($recette);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['deleteRecipe']) && isset($_POST['radioRecipes'])) {
            $recipe  = $_POST['radioRecipes'][0];
            $this->manager->deleteRecipe($recipe);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['modifyRecipe']) && isset($_POST['radioRecipes'])) {
            $recipe = $_POST['radioRecipes'];
            $_SESSION['radioRecipes'] = $this->manager->getRecipe($recipe);           
            echo '<script>window.location.href = "?action=ModifyRecipe";</script>';
        }
        else {
            $_SESSION['allUsers'] = $this->manager->getAllUsers();
            $_SESSION['recipesToAccept'] = $this->manager->getRecipesToAccept();
            $_SESSION['allRecipes'] = $this->manager->getAllRecipes();
        }
        include $_SESSION['dir'] . '/View/DashboardView.php';
    }
}
?>
