<?php
session_start();
$_SESSION['dir'] = __DIR__;
if(!(isset($_SESSION['edito1']))) {
    $_SESSION['edito1'] = "Bienvenue sur le site du PtiCuisto ! ";
}
if(!(isset($_SESSION['edito2']))) {
    $_SESSION['edito2'] =  "Connectez-vous";
}
if (isset($_GET['action']) && $_GET['action'] !== '') {
    $controller = $_GET['action'];
    if (!file_exists('Controller/' . $controller . 'Controller.php')) {
        require 'Controller/TemplateController.php';
        $Contro = new TemplateController();
        $Contro->run(); 
    } else {
        require 'Controller/' . $controller . 'Controller.php';
    }
    if ($controller == "CreateRecipe") {
        $createRecipe = new CreateRecipeController();
        $createRecipe->run();
    }
    if ($controller == "Login") {
        $Login = new LoginController();
        $Login->run();
    }
    if ($controller == "SignIn") {
        $SignIn = new SignInController();
        $SignIn->run();
    }
    if ($controller == "Profile") {
        $Profile = new ProfileController();
        $Profile->run();
    }
    if ($controller == "Edito") {
        $Edito = new EditoController();
        $Edito->run();
    }
    if ($controller == "AllRecipes") {
        $AllRecipes = new AllRecipesController();
        $AllRecipes->run();
    }
    if ($controller == "FilterIngredient"){
        $Filters = new FilterIngredientController();
        $Filters->run();
    }
    if ($controller == "FilterCategory"){
        $Filters = new FilterCategoryController();
        $Filters->run();
    }
    if ($controller == "FilterTitle"){
        $Filters = new FilterTitleController();
        $Filters->run();
    }
    if ($controller == "Dashboard"){
        $Dashboard = new DashboardController();
        $Dashboard->run();
    }
    if ($controller == "ModifMdp"){
        $Mdp = new MdpController();
        $Mdp->run();
    }
} else {
    require 'Controller/TemplateController.php';
        $Contro = new TemplateController();
        $Contro->run(); 
}
