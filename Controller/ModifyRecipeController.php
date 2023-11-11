<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class ModifyRecipeController extends Controller{

    public function __construct(){
        $this->manager = new UsersManager();
    }
    public function run()  {
        
        if(isset($_POST['validateRecipeModif'])){
           
            if(isset($_POST['modified_RE_TITLE']) && ($_POST['modified_RE_TITLE'] !== $_SESSION['radioRecipes'][0]['RE_TITLE'])){    
                $this->manager->recipeModifyReTitle($_POST['modified_RE_TITLE'],$_SESSION['radioRecipes'][0]['RE_TITLE']);                
            }
            if(isset($_POST['modified_CA_TITLE']) && $_POST['modified_CA_TITLE'] != $_SESSION['radioRecipes'][0]['CA_TITLE']){
                $this->manager->recipeModifyCaTitle($_POST['modified_CA_TITLE'],$_SESSION['radioRecipes'][0]['CA_TITLE']);
            }
            if(isset($_POST['modified_RE_SUMMARY']) && $_POST['modified_RE_SUMMARY'] != $_SESSION['radioRecipes'][0]['RE_SUMMARY']){
                $this->manager->recipeModifyReSummary($_POST['modified_RE_SUMMARY'],$_SESSION['radioRecipes'][0]['RE_SUMMARY']);
            }
            if(isset($_POST['modified_RE_CONTENT']) && $_POST['modified_RE_CONTENT'] != $_SESSION['radioRecipes'][0]['RE_CONTENT'] ){
                $this->manager->recipeModifyReContent($_POST['modified_RE_CONTENT'],$_SESSION['radioRecipes'][0]['RE_CONTENT']);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Profile";</script>';
        }
        elseif(isset($_POST['annulateRecipeModif'])){
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Profile";</script>';
        }
        else{
            include $_SESSION['dir'] . '/View/ModifyRecipeView.php';       
        }
    }
}
?>