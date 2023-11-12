<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for EditoController
class EditoController extends Controller
{

    // Constructor for the EditoController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Check user type (assuming a typo fix from = to ==)
        if ($_SESSION['type'] == 1) {
            // If the user type is 1, display the EditoView
            include $_SESSION['dir'] . '/View/EditoView.php';
        }

        // Check if Edito modification is initiated
        if (isset($_POST['modifyEdito'])) {
            // Store Edito data in session variables
            $_SESSION['edito1'] = $_POST['edito1'];
            $_SESSION['edito2'] = $_POST['edito2'];
            // Show an alert message
            echo "<script> alert('Edito modifié'); </script>";
            $_GET['action'] = "";
            // Redirect to the main page
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
}

?>
