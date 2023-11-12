<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';

// Class definition for RecipesController
class RecipesController extends Controller
{
    // Constructor for the RecipesController class
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    // Method to retrieve all recipes
    public function getAllRecipes()
    {
        $res = $this->manager->getAllRecipes();
        return $res;
    }

    // Method to retrieve a specific recipe by ID
    public function getRecipe($re_id)
    {
        $res = $this->manager->getRecipe($re_id);
        return $res;
    }

    // Method to retrieve recipes by a specific user
    public function getRecipesOfUser($us_id)
    {
        $res = $this->manager->getRecipesOfUser($us_id);
        return $res;
    }

    // Method to retrieve recipes based on a specific ingredient
    public function getRecipesbyIngredient($in_title)
    {
        $res = $this->manager->getRecipesbyIngredient($in_title);
        return $res;
    }

    // Method to retrieve recipes by a specific tag
    public function getRecipesByTag($ta_title)
    {
        $res = $this->manager->getRecipesByTag($ta_title);
        return $res;
    }

    // Method to retrieve the latest recipe
    public function getLatestRecipe()
    {
        $res = $this->manager->getLatestRecipe();
        return $res;
    }

    // Method to delete a recipe
    public function deleteRecipe($re_id)
    {
        $res = $this->manager->deleteRecipe($re_id);
    }

    // Method to create a new recipe
    public function createRecipe()
    {
        $res = $this->manager->createRecipe();
    }

    // The main method to run the controller
    public function run()
    {
        // Include the RecipesView for displaying recipes
        include $_SESSION['dir'] . '/View/RecipesView.php';
    }
}

?>
