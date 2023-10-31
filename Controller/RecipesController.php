<?php
require_once('Controller.php');
require_once ('../Modele/RecipesManager.php');

class RecipesController extends Controller {
    public function __construct() {
        $this->manager = new RecipesManager();
    }
    
    public function getAllRecipes(){
        $res = $this->manager->getAllRecipes();
        return $res;
    }

    public function getRecipe($re_id){
        $res = $this->manager->getRecipe($re_id);
        return $res;
    }   

    public function getRecipesOfUser($us_id){
        $res = $this->manager->getRecipesOfUser($us_id);
        return $res;
    }

    public function getRecipesbyIngredient($in_title){
        $res = $this->manager->getRecipesbyIngredient($in_title);
        return $res;
    }

    public function getRecipesByTags($ta_title){
        $res = $this->manager->getRecipesByTags($ta_title);
        return $res;
    }

    public function getLatestRecipe(){
        $res = $this->manager->getLatestRecipe();
        return $res;
    }
}


?>