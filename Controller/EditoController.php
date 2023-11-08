
<?php
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class EditoController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }
    public function run()
    {
        if ($_SESSION['type'] = 1) {
            include $_SESSION['dir'] . '/View/EditoView.php';
        }
    }
}
?>