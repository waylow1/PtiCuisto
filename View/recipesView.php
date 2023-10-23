<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
</head>
<body>
    <?php require_once '../Controller/RecipesController.php';
    $control = new RecipesController();
    $control->getAllRecipes();
    ?>
</body>
</html>