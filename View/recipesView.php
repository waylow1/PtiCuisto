<?php
ob_start();
?>
<br><br><br><br><br>
<form method="post" action= <?php $_SESSION['dir'] . '/Controller/CreateRecipeController.php' ?>>
    <div class="form-outline mb-4">
        <label class="form-label" for="recipeName">Nom de la Recette</label>
        <input type="text" id="recipeName" name="recipeName" class="form-control" required />
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="recipeDescription">Description</label>
        <input type="textarea"  name ="recipeDescription" id="recipeDescription" class="form-control" required />
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="recipePicture">Choisir une image</label>
        <input type="file" id="recipePicture" name="recipePicture" class="form-control" accept="image/png, image/jpeg" required  />
    </div>
    <button type="submit" class="btn btn-primary btn-block mb-3">Envoyer</button>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>