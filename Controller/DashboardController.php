<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/AdminManager.php';

// Class definition for DashboardController
class DashboardController extends Controller
{

    // Constructor for the DashboardController class
    public function __construct()
    {
        $this->manager = new AdminManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Check if a logout action is initiated
        if (isset($_POST['logout'])) {
            // Logout the user and redirect to the main page
            $dir = $_SESSION['dir'];
            session_destroy();
            session_start();
            $_SESSION['dir'] = $dir;
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['suppression'])) {
            // Check if user deletion is confirmed
            if (isset($_COOKIE['confirm']) && $_COOKIE['confirm'] == 'true') {
                // Delete the user and redirect to the main page
                $this->manager->deleteUser();
                $dir = $_SESSION['dir'];
                session_destroy();
                session_start();
                echo '<script> alert("Votre compte a bien été supprimé")</script>';
                $_SESSION['dir'] = $dir;
                $_GET['action'] = '';
                echo '<script>window.location.href = "index.php";</script>';
            }
        } elseif (isset($_POST['modifyUser']) && isset($_POST['radioUsers'])) {
            // Handle user modification action and redirect to the modification page
            $user = $_POST['radioUsers'];
            $_SESSION['radioUsers'] = $this->manager->getUser($user);
            echo '<script>window.location.href = "?action=ModifyUser";</script>';
        } elseif (isset($_POST['denyUser']) && isset($_POST['radioUsers'])) {
            // Deny user and redirect to the main page
            $user = $_POST['radioUsers'];
            $this->manager->deleteUser($user);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['validateRecipe']) && isset($_POST['checkboxesRecipe'])) {
            // Accept multiple recipes and redirect to the main page
            foreach ($_POST['checkboxesRecipe'] as $recette) {
                $this->manager->acceptRecipe($recette);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['denyRecipe']) && isset($_POST['checkboxesRecipe'])) {
            // Deny multiple recipes and redirect to the main page
            foreach ($_POST['checkboxesRecipe'] as $recette) {
                $this->manager->denyRecipe($recette);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['deleteRecipe']) && isset($_POST['radioRecipes'])) {
            // Delete a recipe and redirect to the main page
            $recipe = $_POST['radioRecipes'][0];
            $this->manager->deleteRecipe($recipe);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } elseif (isset($_POST['modifyRecipe']) && isset($_POST['radioRecipes'])) {
            // Handle recipe modification action and redirect to the modification page
            $recipe = $_POST['radioRecipes'];
            $_SESSION['radioRecipes'] = $this->manager->getRecipe($recipe);
            echo '<script>window.location.href = "?action=ModifyRecipe";</script>';
        } else {
            // Initialize data for display in the DashboardView
            $_SESSION['allUsers'] = $this->manager->getAllUsers();
            $_SESSION['recipesToAccept'] = $this->manager->getRecipesToAccept();
            $_SESSION['allRecipes'] = $this->manager->getAllRecipes();
        }
        // Include the view for the dashboard
        include $_SESSION['dir'] . '/View/DashboardView.php';
    }
}

?>
