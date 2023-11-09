<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }

    public function run()
    {
        if (isset($_POST['logout'])) {
            $dir = $_SESSION['dir'];
            session_destroy();
            session_start();
            $_SESSION['dir'] = $dir;
            $_GET['action'] = '';
            header('Location: ' . $_SESSION['dir']);
        }
        
        elseif (isset($_POST['suppression'])) {
            $dir = $_SESSION['dir'];
            session_destroy();
            session_start();
            $_SESSION['dir'] = $dir;
            $_GET['action'] = '';
            header('Location: ' . $_SESSION['dir']);
        }
        include $_SESSION['dir'] . '/View/ProfileView.php';
    }
}
