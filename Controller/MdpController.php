<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UserManager.php';

class MdpController extends Controller
{
    public function __construct() {
        $this->manager = new MdpManager();
    }

    public function run() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password1'], $_POST['password2'])) {
            if ($_POST['password1'] == $_POST['password2']) {
                $this->manager->changePassword($_POST['password1']);
            }
            else {
                echo '<script>alert("Les mots de passe ne correspondent pas")</script>';
            }
        }
        else {
            include $_SESSION['dir'] . '/View/MdpView.php';
        }
    }
}