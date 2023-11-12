<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for ProfileController
class ProfileController extends Controller
{

    // Constructor for the ProfileController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {   
        // Check if the "logout" POST request is submitted
        if (isset($_POST['logout'])) {
            // Handle user logout
            $dir = $_SESSION['dir'];
            session_destroy();
            session_start();
            $_SESSION['dir'] = $dir;
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } 
        // Check if the "suppression" POST request is submitted
        elseif (isset($_POST['suppression'])) {
            // Check for account deletion confirmation
            if (isset($_COOKIE['confirm'])) {
                // If confirmation is true, delete the user account
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
        } 
        // Check if "deleteRecipe" and "modifyRecipe" requests are submitted for user's recipes
        elseif (isset($_POST['deleteRecipe']) && isset($_POST['radioRecipes'])) {
            // Handle recipe deletion
            $recipe  = $_POST['radioRecipes'][0];
            $this->manager->deleteRecipe($recipe);
            $_GET['action'] = '';
            echo '<script>window.location.href = "index.php";</script>';
        } 
        elseif (isset($_POST['modifyRecipe']) && isset($_POST['radioRecipes'])) {
            // Redirect to the "ModifyRecipe" action to edit the selected recipe
            $recipe = $_POST['radioRecipes'][0];
            $_SESSION['radioRecipes'] = $this->manager->getRecipe($recipe);
            echo '<script>window.location.href = "?action=ModifyRecipe";</script>';
        }
        else {
            // Retrieve and store the user's recipes for display
            $_SESSION['current_user_recipes'] = $this->manager->getRecipesOfUser($_SESSION['username']);
            $ingredients = array();
            foreach($_SESSION['current_user_recipes'] as $recipe) {
                $ingredientsParRecette = $this->manager->getIngredientsParRecetteId($recipe['RE_ID']);
                array_push($ingredients, $ingredientsParRecette);
            }
            include $_SESSION['dir'] . '/View/ProfileView.php';
        }
    }
}

?>
