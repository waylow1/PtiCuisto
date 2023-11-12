<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for MdpController
class MdpController extends Controller
{
    // Constructor for the MdpController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password1'], $_POST['password2'])) {
            // Check if the provided passwords match
            if ($_POST['password1'] == $_POST['password2']) {
                // Change the user's password using the UsersManager
                $this->manager->changePassword($_POST['password1']);
            } else {
                // Alert the user if the provided passwords do not match
                echo '<script>alert("Les mots de passe ne correspondent pas")</script>';
            }
        } else {
            // Display the password change view if there is no form submission
            include $_SESSION['dir'] . '/View/MdpView.php';
        }
    }
}

?>
