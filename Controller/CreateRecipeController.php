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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['recipeName'])) {
                $_POST['userName']='admin123';
                $uploadDirectory = $_SESSION['dir'] . '/assets/dish/';
                $file = $_FILES['recipePicture'];
                $fileName = $file['name'];
                $tmpFilePath = $file['tmp_name'];
                $destination = $uploadDirectory . $fileName;

                $this->manager->createRecipe($fileName);

                if (move_uploaded_file($tmpFilePath, $destination)) {
                    echo 'Le fichier a été téléversé avec succès.';
                } 
            }
        } else {
            include $_SESSION['dir'] . '/View/RecipesView.php';
        }
    }
}
