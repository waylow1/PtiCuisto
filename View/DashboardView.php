<?php
ob_start();
$content = ob_get_clean();
?>
<br><br><br><br><br>


<form method="post" action=<?php $_SESSION['dir'] . '/Controller/DashboardController.php'?>>
    <button type=submit class="btn btn-danger btn-block mb-4 " name='logout' value="Déconnexion">Déconnexion</button>
</form>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>