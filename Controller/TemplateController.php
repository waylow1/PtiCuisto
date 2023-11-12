<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';

// Class definition for TemplateController
class TemplateController extends Controller
{
    // Constructor for the TemplateController class
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Get the latest recipes from the manager
        $Latest = $this->manager->getLatestRecipes();
        
        // Include the Template view to display the latest recipes
        include $_SESSION['dir'] . '/View/Template.php';
    }
}

?>
