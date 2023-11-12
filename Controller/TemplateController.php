<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';
class TemplateController extends Controller
{
    public function __construct()
    {
        $this->manager = new RecipesManager();
    }
    public function run()
    {
        $Latest = $this->manager->getLatestRecipes();
        include $_SESSION['dir'] . '/View/Template.php';
    }
}
