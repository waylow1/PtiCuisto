<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class SignInController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }


    public function run()
    {
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $temp = $this->manager->selectMaxID();
        $var = $temp[0]['max'] + 1;

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pseudo'], $_POST['password1'], $_POST['password2'], $_POST['mail'], $_POST['firstname'], $_POST['lastname'])) {
            $verifPseudo = $this->manager->selectPseudo($_POST['pseudo']);
            if (empty($verifPseudo)) {
                if (preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) && preg_match('/^[a-zA-Z]+$/', $_POST['lastname'])) {
                    if ($_POST['password1'] == $_POST['password2']) {
                        $insert = $this->manager->insertUser($var, $_POST['pseudo'], password_hash($_POST['password2'], PASSWORD_DEFAULT), $_POST['mail'], $_POST['firstname'], $_POST['lastname']);
                        if ($insert) {
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
        include $_SESSION['dir'] . '/View/SignInView.php';
    }
}
?>