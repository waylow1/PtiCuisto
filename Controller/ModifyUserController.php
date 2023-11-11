<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/AdminManager.php';
class ModifyUserController extends Controller{

    public function __construct(){
        $this->manager = new AdminManager();
    }
    public function run()  {
        
        if(isset($_POST['validateUserModif'])){
           
            if(isset($_POST['modified_UST_ID'])){
                $this->manager->userModifyUstId($_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_USS_JD'])){
                $this->manager->userModifyUssJd($_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_PSEUDO'])){
                $this->manager->userModifyUsPseudo($_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_MAIL'])){
                $this->manager->userModifyUsMail($_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_FIRSTNAME'])){
                $this->manager->userModifyUsFirstName($_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_LASTNAME'])){
                $this->manager->userModifyUsLastName($_SESSION['radioUsers'][0]['US_ID']);
            }
        }
        else{
            include $_SESSION['dir'] . '/View/ModifyUserView.php';       
        }
    }
}
?>