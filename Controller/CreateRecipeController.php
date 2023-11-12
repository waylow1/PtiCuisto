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

        // Check if an ingredient is being added
        if (isset($_GET['Ingredient'])) {
            $ingredientName = $_GET['Ingredient'];
            $count = $this->manager->getIngredient($ingredientName);
            if ($count == 0) {
                // Insert the ingredient if it doesn't exist
                $this->manager->insertIngredient($ingredientName);
            }
            // Handle the case where the ingredient already exists
        }

        // Check if a recipe is being submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRecipe'])) {
            $uploadDirectory = $_SESSION['dir'] . '/assets/dish/';
            $file = $_FILES['recipePicture'];
            $fileName = $file['name'];
            $tmpFilePath = $file['tmp_name'];
            $destination = $uploadDirectory . $fileName;

            // Create a new recipe and get its ID
            $recipeId = $this->manager->createRecipe($fileName);

            // Check if ingredient data is available and insert into the recipe
            if (!empty($ingredientArray)) {
                foreach ($ingredientArray as $ingredient) {
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
