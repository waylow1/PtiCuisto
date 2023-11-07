<?php
ob_start();
?>

<form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php' ?>></form>

<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>