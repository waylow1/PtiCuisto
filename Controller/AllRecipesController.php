<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';

class AllRecipesController extends Controller
{
    // Constructor for the AllRecipesController class
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Retrieve all recipes using the manager
        $allRecipes =  $this->manager->getAllRecipes();

        // Include the view to display all recipes
        include $_SESSION['dir'] . '/View/AllRecipesView.php';
    }
}

?>
