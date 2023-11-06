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
            if(isset($_POST['recipeName'])){
                if(isset($_POST['userName'])){
                    $this->manager->createRecipe($_POST);
                }
            }
        }
        else{
            include $_SESSION['dir'] . '/View/RecipesView.php';
        }
    }
}
