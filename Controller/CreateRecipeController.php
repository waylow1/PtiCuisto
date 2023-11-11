<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';

class CreateRecipeController extends Controller
{
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    public function run()
    {
        
        $allIngredient = $this->manager->getAllIngredients();
        if (isset($_GET['Ingredient'])) {
            $ingredientName = $_GET['Ingredient'];
            $count = $this->manager->getIngredient($ingredientName);
            if ($count == 0) {
                echo "<script> console.log('la');</script>";
                $this->manager->insertIngredient($ingredientName);
                $_SESSION['ingredient'][] = $ingredientName;
                echo '<script>console.log(' . json_encode($_SESSION['ingredient']) . ')</script>;';
            } else {
                echo "<script> console.log('ici');</script>";
                $_SESSION['ingredient'][] = $ingredientName;
                echo '<script>console.log(' . json_encode($_SESSION['ingredient']) . ');</script>';
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRecipe'])) {
            echo "<script> console.log('ici');</script>";
            $uploadDirectory = $_SESSION['dir'] . '/assets/dish/';
            $file = $_FILES['recipePicture'];
            $fileName = $file['name'];
            $tmpFilePath = $file['tmp_name'];
            $destination = $uploadDirectory . $fileName;
            $recipeId = $this->manager->createRecipe($fileName);

            if (isset($_SESSION['ingredient'])) {
                foreach ($_SESSION['ingredient'] as $ingredient) {
                    $this->manager->insertIngredientInRecipe($ingredient, $recipeId);
                } 
            }
            

            if (move_uploaded_file($tmpFilePath, $destination)) {
                echo "<script> alert('Recette téléversée'); </script>";
                $_GET['action'] = "";
                echo '<script>window.location.href = "index.php";</script>';
            }
        }

        include $_SESSION['dir'] . '/View/RecipesView.php';
    }
}
