<?php
ob_start();
$content = ob_get_clean();
?>
<br><br><br><br><br><br><br><br><br><br>

<script src="../js/RecipeDisplay.js"></script>
<script>
    re = new RecipeDisplay(<?php echo json_encode($allRecipes); ?>);
    console.log("ici");
</script>

<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>