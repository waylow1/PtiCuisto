<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';
class FilterIngredientController extends Controller
{

    public function __construct()
    {
        $this->manager = new RecipesManager();
    }

    public function run(){
        
    }

}
?>