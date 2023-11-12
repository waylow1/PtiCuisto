<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';
class AllRecipesController extends Controller
{

    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    public function run(){
        $allRecipes =  $this->manager->getAllRecipes();
        $ingredients = array();
        foreach($allRecipes as $recipe) {
            $ingredientsParRecette = $this->manager->getIngredientsParRecetteId($recipe['RE_ID']);
            array_push($ingredients, $ingredientsParRecette);
        }
        include $_SESSION['dir'] . '/View/AllRecipesView.php';
    }

}
?>