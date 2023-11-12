<?php
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';
class FilterController extends Controller{

    public function __construct()
    {
        $this->manager = new RecipesManager();
    }
    public function run()
    {
        include $_SESSION['dir'] . '/View/FilterView.php';
    }


}