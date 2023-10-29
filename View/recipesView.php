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
    echo 'getAllRecipes() : <br>';
    for($i = 0; $i< count($result);$i++){
        echo 'Titre: ', $result[$i]['RE_TITLE']  ;
        echo '<br>';
        echo 'Catégorie: ', $result[$i]['CA_TITLE'];
        echo '<br>';
        echo 'Recette: ', $result[$i]['RE_CONTENT'];
        echo '<br>';
        echo 'Utilisateur ', $result[$i]['US_PSEUDO'];
        echo '<br> <br>';
    }

    $result = $control->getRecipe(2);
    echo 'GetRecipe() : <br>';
    echo 'Titre: ', $result[0]['RE_TITLE'];
    echo '<br>';
    echo 'Catégorie: ', $result[0]['CA_TITLE'];
    echo '<br>';
    echo 'Recette: ', $result[0]['RE_CONTENT'];
    echo '<br>';
    echo 'Utilisateur ', $result[$i]['US_PSEUDO'];
    echo '<br> <br>';


    $result = $control->getRecipesOfUser(1);
    echo 'getRecipesOfUser() : <br>';
    for($i = 0; $i< count($result);$i++){
        echo 'Titre: ', $result[$i]['RE_TITLE']  ;
        echo '<br>';
        echo 'Catégorie: ', $result[$i]['CA_TITLE'];
        echo '<br>';
        echo 'Recette: ', $result[$i]['RE_CONTENT'];
        echo '<br>';
        echo 'Utilisateur ', $result[$i]['US_PSEUDO'];
        echo '<br> <br>';
    }

    
    echo 'getRecipesByIngredient() : <br>';
   
    echo 'getRecipesByTags() : <br>';
    
    echo 'getLatestRecipe() : <br>';
    $result = $control->getLatestRecipe();
    echo 'Titre: ', $result[0]['RE_TITLE']  ;
        echo '<br>';
        echo 'Catégorie: ', $result[0]['CA_TITLE'];
        echo '<br>';
        echo 'Recette: ', $result[0]['RE_CONTENT'];
        echo '<br>';
        echo 'Utilisateur ', $result[0]['US_PSEUDO'];
        echo '<br> <br>';
    ?>


</body>
</html>