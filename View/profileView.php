<?php
ob_start();
$content = ob_get_clean();

if(isset($_SESSION['username'])  && isset($_SESSION['password'])){


?>

<br><br><br><br><br><br><br><br><br><br>

<form method="post">
<button type=submit name= 'logout' value="Déconnexion"> </button>
</form>



<?php 
if(isset($_POST['logout'])){
    $control = new UsersController();
    $control->logOut();

}

include $_SESSION['dir'] . '/View/Layout.php';
}
else{
    echo "Pour accéder à votre profil, veuillez vous connecter. ";

}

?>
