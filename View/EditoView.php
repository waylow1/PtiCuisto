<?php
ob_start();
?>
<br><br><br><br><br><br><br><br><br><br>
<form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php' ?>>
    <label for="edito1"> Texte gauche  : </label>
    <textarea id="edito1" name="edito1"> </textarea>
    <label for="edito2"> Text droit : </label>
    <textarea id="edito2" name="edito2"> </textarea> 
</form>

<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>