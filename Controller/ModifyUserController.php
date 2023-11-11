<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/AdminManager.php';
class ModifyUserController extends Controller{

    public function __construct(){
        $this->manager = new AdminManager();
    }
    public function run()  {
        
        if(isset($_POST['validateUserModif'])){
           
            if(isset($_POST['modified_UST_ID']) && ($_POST['modified_UST_ID'] !== $_SESSION['radioUsers'][0]['UST_ID'])){
                $this->manager->userModifyUstId($_POST['modified_UST_ID'],$_SESSION['radioUsers'][0]['US_ID']);                
            }
            if(isset($_POST['modified_USS_JD']) && $_POST['modified_USS_JD'] != $_SESSION['radioUsers'][0]['USS_JD']){
                $this->manager->userModifyUssJd($_POST['modified_USS_JD'],$_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_PSEUDO']) && $_POST['modified_US_PSEUDO'] != $_SESSION['radioUsers'][0]['US_PSEUDO']){
                $this->manager->userModifyUsPseudo($_POST['modified_US_PSEUDO'],$_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_MAIL']) && $_POST['modified_US_MAIL'] != $_SESSION['radioUsers'][0]['US_MAIL'] ){
                $this->manager->userModifyUsMail($_POST['modified_US_MAIL'],$_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_FIRSTNAME']) && $_POST['modified_US_FIRSTNAME'] != $_SESSION['radioUsers'][0]['US_FIRSTNAME'] ){
                $this->manager->userModifyUsFirstName($_POST['modified_US_FIRSTNAME'],$_SESSION['radioUsers'][0]['US_ID']);
            }
            if(isset($_POST['modified_US_LASTNAME']) && $_POST['modified_US_LASTNAME'] != $_SESSION['radioUsers'][0]['US_LASTNAME']){
                $this->manager->userModifyUsLastName($_POST['modified_US_LASTNAME'],$_SESSION['radioUsers'][0]['US_ID']);
            }
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Dashboard";</script>';
        }
        elseif(isset($_POST['annulateUserModif'])){
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Dashboard";</script>';
        }
        else{
            include $_SESSION['dir'] . '/View/ModifyUserView.php';       
        }
    }
}
?>