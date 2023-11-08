<?php
session_start();
$_SESSION['dir'] =__DIR__;
if (isset($_GET['action']) && $_GET['action'] !== '') {
    $controller = $_GET['action'];
    if (!file_exists('Controller/' . $controller . 'Controller.php')) {
        include $_SESSION['dir'] . '/View/Template.php';
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
    if ($controller == "Edito"){
        $Edito = new EditoController();
        $Edito->run();
    }
} 
else {
    include $_SESSION['dir'] . '/View/Template.php';
}
