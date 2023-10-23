<?php
require_once 'Controller.php';
require_once '../Modele/RecipesManager.php';

class RecipesController extends Controller {
    public function __construct() {
        $this->manager = new RecipesManager();
    }
    
    public function getAllRecipes(){
        $res = $this->manager->getAllRecipes();
    
    }
}


?>