<?php
class UsersController extends Controller{

    public function __construct(){
        $this ->manager = new UsersManager();
    }
    public function verifPseudo(){
        if(isset($_POST['submit'])){
            if(isset($_POST['pseudo'])){
                $this->manager->verifPseudo($_POST['pseudo']);
                echo "la";
            }
        }
        echo "ici";
    }
   
}
?>
