<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/AdminManager.php';

// Class definition for ModifyUserController
class ModifyUserController extends Controller
{

    // Constructor for the ModifyUserController class
    public function __construct()
    {
        $this->manager = new AdminManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Check if the "validateUserModif" POST request is submitted
        if (isset($_POST['validateUserModif'])) {
            // Check if modified values are provided and different from the original values
            if (isset($_POST['modified_UST_ID']) && ($_POST['modified_UST_ID'] !== $_SESSION['radioUsers'][0]['UST_ID'])) {
                // Update the user's role (UST_ID)
                $this->manager->userModifyUstId($_POST['modified_UST_ID'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            if (isset($_POST['modified_USS_JD']) && $_POST['modified_USS_JD'] != $_SESSION['radioUsers'][0]['USS_JD']) {
                // Update the user's account status (USS_JD)
                $this->manager->userModifyUssJd($_POST['modified_USS_JD'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            if (isset($_POST['modified_US_PSEUDO']) && $_POST['modified_US_PSEUDO'] != $_SESSION['radioUsers'][0]['US_PSEUDO']) {
                // Update the user's pseudonym (US_PSEUDO)
                $this->manager->userModifyUsPseudo($_POST['modified_US_PSEUDO'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            if (isset($_POST['modified_US_MAIL']) && $_POST['modified_US_MAIL'] != $_SESSION['radioUsers'][0]['US_MAIL']) {
                // Update the user's email address (US_MAIL)
                $this->manager->userModifyUsMail($_POST['modified_US_MAIL'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            if (isset($_POST['modified_US_FIRSTNAME']) && $_POST['modified_US_FIRSTNAME'] != $_SESSION['radioUsers'][0]['US_FIRSTNAME']) {
                // Update the user's first name (US_FIRSTNAME)
                $this->manager->userModifyUsFirstName($_POST['modified_US_FIRSTNAME'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            if (isset($_POST['modified_US_LASTNAME']) && $_POST['modified_US_LASTNAME'] != $_SESSION['radioUsers'][0]['US_LASTNAME']) {
                // Update the user's last name (US_LASTNAME)
                $this->manager->userModifyUsLastName($_POST['modified_US_LASTNAME'], $_SESSION['radioUsers'][0]['US_ID']);
            }
            // Redirect to the Dashboard page after the modifications
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Dashboard";</script>';
        }
        // Check if the "annulateUserModif" POST request is submitted
        elseif (isset($_POST['annulateUserModif'])) {
            // Redirect to the Dashboard page without applying any modifications
            $_GET['action'] = '';
            echo '<script>window.location.href = "?action=Dashboard";</script>';
        }
        // Display the ModifyUserView if there is no form submission
        else {
            include $_SESSION['dir'] . '/View/ModifyUserView.php';
        }
    }
}

?>
