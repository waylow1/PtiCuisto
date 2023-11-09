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
            echo '<script>window.location.href = "index.php";</script>';
        }
        elseif (isset($_POST['suppression'])) {
            unset($_COOKIE['confirm']);
            ?>
        
            <script>
                document.cookie = "confirm=" + escape(confirm("Confirmez la suppression du compte.")) + "; path=/";
                console.log(document.cookie)
            </script>
            <?php
            sleep(1);
            if(isset($_COOKIE['confirm'])){
                if($_COOKIE['confirm'] == 'true') {
                    $this->manager->deleteUser();
                    $dir = $_SESSION['dir'];
                    session_destroy();
                    session_start();
                    $_SESSION['dir'] = $dir;
                    $_GET['action'] = '';
                    echo '<script>window.location.href = "index.php";</script>';
                }
            }
            
        }
        include $_SESSION['dir'] . '/View/ProfileView.php';
    }
}
