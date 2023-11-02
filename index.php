<?php 
    session_start();
    $_SESSION['dir'] = __DIR__;
    if (isset($_GET['action']) && $_GET['action']!==''){
        $controller=$_GET['action'];
        if(!file_exists('Controller/'.$controller.'Controller.php')){
            include $_SESSION['dir'] .'/View/Template.php';
        }else{
            require 'Controller/'.$controller.'Controller.php';
        }  
        if($controller=="Recipes"){
            $Users = new RecipesController();
            $Users->run();
        }
        if($controller=="Users"){
            $Users = new UsersController();
            $Users->run();
        }
    }
    else{
        include $_SESSION['dir'] .'/View/Template.php';
    }
?>
    
