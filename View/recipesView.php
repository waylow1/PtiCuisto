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
    $result = $control->getAllRecipes();
    
    for($i = 0; $i< count($result);$i++){
        echo 'Titre : ', $result[$i]['RE_TITLE']  ;
        echo '<br>';
        echo 'Catégorie :', $result[$i]['CA_TITLE'];
        echo '<br>';
        echo 'Recette : ', $result[$i]['RE_CONTENT'];
        echo '<br> <br>';
    }
    ?>
</body>
</html>