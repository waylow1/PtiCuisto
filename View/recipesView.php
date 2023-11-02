<?php
ob_start();
?>
<body>
<form>

    <label for="RecipeName">Nom de la Recette :
    <input type="textarea">

</body>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir']. '/View/layout.php';
?>
</html>