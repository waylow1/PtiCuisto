<?php
ob_start();
?>
<br><br><br><br><br>

<div id="container"></div>

<script src="../js/RecipeDisplay.js"></script>
<script>
    Display = new RecipeDisplay(<?php echo json_encode($allRecipes); ?>);
    Display.DisplayForAllRecipes();
</script>

<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>