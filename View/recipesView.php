<?php
ob_start();
?>
<body>
    <form method="GET" action="recipes"></form>
    <?php require_once '../Controller/RecipesController.php';
    $control = new RecipesController();
    $control->getAllRecipes();
    ?>
</body>
<?php
    $content = ob_get_clean();
    include 'layout.php';
?>
</html>