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
            if (move_uploaded_file($tmpFilePath, $destination)) {
                echo "<script> alert('Recette téléversée'); </script>";
                $_GET['action'] = "";
                echo '<script>window.location.href = "index.php";</script>';
            }
        }

        include $_SESSION['dir'] . '/View/RecipesView.php';
    }
}
?>
