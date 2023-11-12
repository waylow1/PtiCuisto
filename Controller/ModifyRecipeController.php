<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for ModifyRecipeController
class ModifyRecipeController extends Controller
{

    // Constructor for the ModifyRecipeController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Check if the "validateRecipeModif" POST request is submitted
        if (isset($_POST['validateRecipeModif'])) {
            // Check if modified values are provided and different from the original values
            if (isset($_POST['modified_RE_TITLE']) && ($_POST['modified_RE_TITLE'] !== $_SESSION['radioRecipes'][0]['RE_TITLE'])) {
                // Update the recipe title
                $this->manager->recipeModifyReTitle($_POST['modified_RE_TITLE'], $_SESSION['radioRecipes'][0]['RE_ID']);
            }

            if (isset($_POST['modified_CA_TITLE']) && $_POST['modified_CA_TITLE'] != $_SESSION['radioRecipes'][0]['CA_TITLE']) {
                // Update the recipe category title
                $this->manager->recipeModifyCaTitle($_POST['modified_CA_TITLE'], $_SESSION['radioRecipes'][0]['RE_ID']);
            }

            if (isset($_POST['modified_RE_SUMMARY']) && $_POST['modified_RE_SUMMARY'] != $_SESSION['radioRecipes'][0]['RE_SUMMARY']) {
                // Update the recipe summary
                $this->manager->recipeModifyReSummary($_POST['modified_RE_SUMMARY'], $_SESSION['radioRecipes'][0]['RE_ID']);
            }

            if (isset($_POST['modified_RE_CONTENT']) && $_POST['modified_RE_CONTENT'] != $_SESSION['radioRecipes'][0]['RE_CONTENT']) {
                // Update the recipe content
                $this->manager->recipeModifyReContent($_POST['modified_RE_CONTENT'], $_SESSION['radioRecipes'][0]['RE_ID']);
            }

            // Redirect to the appropriate page based on the user's role
            $_GET['action'] = '';
            if ($_SESSION['current_user_informations']['UST_ID'] == 1) {
                echo '<script>window.location.href = "?action=Dashboard";</script>';
            } else {
                echo '<script>window.location.href = "?action=Profile";</script>';
            }
        }
        // Check if the "annulateRecipeModif" POST request is submitted
        elseif (isset($_POST['annulateRecipeModif'])) {
            // Redirect to the appropriate page based on the user's role
            $_GET['action'] = '';
            if ($_SESSION['current_user_informations']['UST_ID'] == 1) {
                echo '<script>window.location.href = "?action=Dashboard";</script>';
            } else {
                echo '<script>window.location.href = "?action=Profile";</script>';
            }
        }
        // Display the ModifyRecipeView if there is no form submission
        else {
            include $_SESSION['dir'] . '/View/ModifyRecipeView.php';
        }
    }
}

?>
