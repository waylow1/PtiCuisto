<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class AllRecipesController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    public function run(){
        include $_SESSION['dir'] . '/View/AllRecipesView.php';
    }

}
?>