<?php
// Start output buffering to capture the echoed content
ob_start();
?>
<br><br><br><br><br><br><br>

<div class="container text-center">
    <h1>Modify the Edito:</h1>
    <form method="post" action="<?php echo $_SESSION['dir'] . '/Controller/UsersController.php' ?>">
        <label for="edito1">Left Text:</label>
        <br>
        <textarea id="edito1" name="edito1"></textarea>
        <br>
        <label for="edito2">Right Text:</label>
        <br>
        <textarea id="edito2" name="edito2"></textarea>
        <br>
        <button type="submit" name='modifyEdito' value="Modifier">Modify</button>
    </form>
</div>

<?php
// Get the buffered content and clean the output buffer
$content = ob_get_clean();
// Include the layout file
include $_SESSION['dir'] . '/View/Layout.php';
?>