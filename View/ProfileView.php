<?php
ob_start();
?>

<br><br><br><br><br><br><br><br><br><br>

<form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php'?>>
<button type=submit name='logout' value="Déconnexion" href=""> Déconnexion </button>
</form>



<?php 
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>  
