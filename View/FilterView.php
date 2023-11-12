<?php
ob_start();
?>
<br><br><br><br><br>

<div id="container"></div>

<?php
if (isset($_GET['filteredRecipes'])) {
    $encodedRecipes = $_GET['filteredRecipes'];
    $filteredRecipes = json_decode(urldecode($encodedRecipes), true); 
} 
else {
    
}
?>







<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>