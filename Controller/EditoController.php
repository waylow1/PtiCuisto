
<?php
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';
class EditoController extends Controller
{

    public function __construct()
    {
        $this->manager = new UsersManager();
    }
    public function run(){
        if($_SESSION['type'] = 1 ){       
            include $_SESSION['dir'] . '/View/EditoView.php';  
        }
        if(isset($_POST['modifyEdito'])){
            $_SESSION['edito1'] = $_POST['edito1'];
            $_SESSION['edito2'] = $_POST['edito2'];
            echo "<script> alert('Edito modifié'); </script>";
            $_GET['action'] = "";
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
}
?>