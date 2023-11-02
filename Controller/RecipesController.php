 <?php

require_once $_SESSION['dir'].'/Controller/Controller.php';
require_once $_SESSION['dir'].'/Modele/RecipesManager.php';

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

    public function getRecipesByTag($ta_title){
        $res = $this->manager->getRecipesByTag($ta_title);
        return $res;
    }

    public function getLatestRecipe(){
        $res = $this->manager->getLatestRecipe();
        return $res;
    }
    
    public function deleteRecipe($re_id){
        $res = $this->manager->deleteRecipe();
    }

    public function createRecipe(){
        $res = $this->manager->createRecipe();
    }
    public function run(){
        include $_SESSION['dir']. '/View/recipesView.php';
    }
}


?>