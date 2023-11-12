<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/RecipesManager.php';
class LayoutController extends Controller
{

    public function run()
    {
        $this->manager = new RecipesManager;
    }



}