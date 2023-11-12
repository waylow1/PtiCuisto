<?php
// Start output buffering to capture the echoed content
ob_start();
?>

<!-- Add multiple line breaks for spacing -->
<br><br><br><br><br>

<!-- Container for displaying recipes -->
<div id="container"></div>

<!-- Include the RecipeDisplay.js script -->
<script src="../js/RecipeDisplay.js"></script>

<!-- Create a new RecipeDisplay instance and display all recipes -->
<script>
    // Instantiate a RecipeDisplay object and pass the $allRecipes variable as JSON data
    Display = new RecipeDisplay(<?php echo json_encode($allRecipes); ?>);

    // Call the DisplayForAllRecipes method to display all recipes
    Display.DisplayForAllRecipes();
</script>

<?php
// Get the buffered content and clean the output buffer
$content = ob_get_clean();

// Include the Layout.php file using the session directory
include $_SESSION['dir'] . '/View/Layout.php';
?>
