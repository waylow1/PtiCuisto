<?php 
    session_start();
    $_SESSION['dir'] = __DIR__;
    
    if (isset($_GET['action']) && $_GET['action']!==''){
        $controller=$_GET['action'];
        require 'Controller/'.$controller.'Controller.php';
        if($controller=="Recipes"){
            $Users = new RecipesController();
            $Users->run();
        }
        if($controller=="Users"){
            $Users = new UsersController();
            $Users->run();
        }
        if($controller=="Login"){
            $Users = new UsersController();
            $Users->login();
        }
    }
    else {
        include $_SESSION['dir'] .'/View/Template.php';
    }
?>
    
