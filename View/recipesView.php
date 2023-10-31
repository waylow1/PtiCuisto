<?php
ob_start();
?>
<body>
    <?php require_once 'PtitCuistot/Controlle/RecipesController.php';
    $control = new RecipesController();
    $result = $control->getAllRecipes();
   
    ?>


</body>
<?php
    $content = ob_get_clean();
    include 'layout.php';
?>
</html>