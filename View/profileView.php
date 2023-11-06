<?php
ob_start();
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';

if(isset($_SESSION['username'])  && isset($_SESSION['password'])){
    
?>



<?php }
else{
    echo "Pour accéder à votre profil, veuillez vous connecter. ";

}

?>
