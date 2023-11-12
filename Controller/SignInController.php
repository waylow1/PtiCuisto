<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for SignInController
class SignInController extends Controller
{
    // Constructor for the SignInController class
    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    // The main method to run the controller
    public function run()
    {
        // Retrieve the maximum user ID to generate a new ID
        $temp = $this->manager->selectMaxID();
        $var = $temp[0]['max'] + 1;

        // Check if the user submitted the registration form
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pseudo'], $_POST['password1'], $_POST['password2'], $_POST['mail'], $_POST['firstname'], $_POST['lastname'])) {
            // Check if the entered pseudo is available
            $verifPseudo = $this->manager->selectPseudo($_POST['pseudo']);
            if (empty($verifPseudo)) {
                // Validate that the first name and last name contain only letters
                if (preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) && preg_match('/^[a-zA-Z]+$/', $_POST['lastname'])) {
                    // Check if the two password fields match
                    if ($_POST['password1'] == $_POST['password2']) {
                        // Hash the password before storing it
                        $insert = $this->manager->insertUser($var, $_POST['pseudo'], password_hash($_POST['password2'], PASSWORD_DEFAULT), $_POST['mail'], $_POST['firstname'], $_POST['lastname']);
                        if ($insert) {
                            // Redirect to the user's profile page after successful registration
                            $_GET['action'] = 'Profile';
                            header('Location: ' . $_SESSION['dir']);
                            exit;
                        }
                    } else {
                        echo '<script>alert("Les mots de passe ne correspondent pas")</script>';
                    }
                } else {
                    echo '<script>alert("Le nom et le prénom ne doivent contenir que des lettres")</script>';
                }
            } else {
                echo '<script>alert("Ce pseudo existe déjà")</script>';
            }
        }
        // Include the SignInView for user registration
        include $_SESSION['dir'] . '/View/SignInView.php';
    }
}

?>
