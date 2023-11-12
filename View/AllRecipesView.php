<?php
ob_start();
?>
<br><br><br><br><br>

<div id="container"></div>

<script src="../js/RecipeDisplay.js"></script>
<script>
    Display = new RecipeDisplay(<?php echo json_encode($allRecipes); ?>, <?php echo json_encode($ingredients); ?>);
    Display.DisplayForAllRecipes(false);
</script>
<div class="d-flex justify-content-center mb-5">
    <button type="submit" name="10moreRecipes" id="10moreRecipes" class="btn btn-primary">+</button>
</div>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>