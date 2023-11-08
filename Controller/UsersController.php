<?php

require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class UsersController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
        $_SESSION['current_user_info'] = $this->manager->verifInformations($_SESSION['username'], $_SESSION['password']);
    }

    public function logOut()
    {
        if (isset($_POST['logout'])) {
            var_dump(($_SESSION['dir']));
            var_dump($_POST['logout']);
            $dir = $_SESSION['dir'];
            session_destroy();
            var_dump($_SESSION);
        }
    }

    public function deleteAcc() {
        if (isset($_POST['suppression'])) {
            ?>
            <script>
                function confirmBox(message) {
                    console.log('aaaaaaaaaaaaa')
                    if (confirm(confirmBox)) {
                        return true;
                    } else {
                        return false;
                    }
                }

                if(confirmBox("Confirmer la suppression du compte.")) {
            <?php
                var_dump(($_SESSION['dir']));
                var_dump($_POST['deleteAcc']);
                $dir = $_SESSION['dir'];
                session_destroy();
                var_dump($_SESSION);
            ?>
                }
            </script>
       <?php}
    }

    public function run()
    {
        include $_SESSION['dir'];
    }
}
?>