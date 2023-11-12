<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for LoginController
class LoginController extends Controller
{

    // Constructor for the LoginController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            // Fetch the hashed password from the database based on the provided username
            $verifPassword = $this->manager->selectPass($_POST['username']);

            // Check if a password exists for the given username and verify it
            if (!(empty($verifPassword)) && password_verify($_POST['password'], $verifPassword[0]['US_PASSWORD'])) {
                // Validate user information
                $verif = $this->manager->verifInformations($_POST['username'], $verifPassword[0]['US_PASSWORD']);

                if (!(empty($verif))) {
                    if (!(is_null($verif[0]))) {
                        // Store user session data and redirect to the index page
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['password'] = $_POST['password'];
                        $_SESSION['current_user_informations'] = $verif[0];

                        $_GET['action'] = "";
                        echo '<script>window.location.href = "index.php";</script>';
                    }
                } else {
                    // Alert user if the provided username or password is incorrect
                    echo '<script> alert ("Pseudo ou mot de passe incorrect") </script>';
                    include $_SESSION['dir'] . '/View/LoginView.php';
                }
            } else {
                // Alert user if the password is incorrect or the username already exists
                echo '<script> alert ("mot de passe incorrect ou le pseudo existe déjà") </script>';
                include $_SESSION['dir'] . '/View/LoginView.php';
            }
        } else {
            // Display the login view if there is no form submission
            include $_SESSION['dir'] . '/View/LoginView.php';
        }
    }
}

?>
