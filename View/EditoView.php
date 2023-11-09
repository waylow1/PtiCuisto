<?php
ob_start();
?>
<br><br><br><br><br><br><br>

<br>
<div class="container text-center">
<h1> Modifier l'Edito : </h1>
<form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php' ?>>
    <label for="edito1"> Texte gauche : </label>
    <br>
    <textarea id="edito1" name="edito1"> </textarea>
    <br>
    <label for="edito2"> Text droit : </label>
    <br>
    <textarea id="edito2" name="edito2"> </textarea>
    <br>
    <button type="submit"  name='modifyEdito' value="Modifier"> Modifier </button>
</form>
</div>

<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>