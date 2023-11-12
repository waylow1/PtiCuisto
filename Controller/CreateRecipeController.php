<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';

// Class definition for CreateRecipeController
class CreateRecipeController extends Controller
{
    // Constructor for the CreateRecipeController class
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Retrieve all ingredients
        $allIngredient = $this->manager->getAllIngredients();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRecipe'])) {
            $uploadDirectory = $_SESSION['dir'] . '/assets/dish/';
            $file = $_FILES['recipePicture'];
            $fileName = $file['name'];
            $tmpFilePath = $file['tmp_name'];
            $destination = $uploadDirectory . $fileName;

            $ingredientArray = json_decode($_POST['ingredientContainer']);

            $recipeId = $this->manager->createRecipe($fileName);
            if (!empty($ingredientArray)) {
                foreach ($ingredientArray as $ingredient) {
                    $count = $this->manager->getIngredient($ingredient);
                    if ($count == 0) {
                        $this->manager->insertIngredient($ingredient);
                    }
                    $this->manager->insertIngredientInRecipe($ingredient, $recipeId);
                }
            }

            // Move the uploaded recipe picture and display a success message
            if (move_uploaded_file($tmpFilePath, $destination)) {
                echo "<script> alert('Recipe uploaded'); </script>";
                $_GET['action'] = "";
                echo '<script>window.location.href = "index.php";</script>';
            }
        }

        // Include the view for creating recipes
        include $_SESSION['dir'] . '/View/RecipesView.php';
    }
}

?>
