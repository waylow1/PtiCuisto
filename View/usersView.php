<?php
ob_start();
?>
<br><br><br><br><br><br><br>
<form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php' ?>>
    <p>Entrez votre pseudo</p>
    <input type="text" id="pseudo">
    <p>Entrez votre mot de passe</p>
    <input type="text" id="mdp" >
    <input type="submit" value="Envoyer">
</form>
<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>