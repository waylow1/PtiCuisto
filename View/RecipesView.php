<?php
ob_start();
?>
<br><br><br><br><br>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="d-flex justify-content-center">
<form id="recipeForm" method="post" enctype="multipart/form-data" action=<?php $_SESSION['dir'] . '/Controller/CreateRecipeController.php' ?> class="container">
    <div class="form-group mb-3">
        <label for="recipeName"><strong>Nom de la Recette</strong></label>
        <input type="text" id="recipeName" name="recipeName" class="form-control form-control-sm" required />
        <small id="nameCharacterCount" class="form-text text-muted">Caractères restants : <span id="remainingCharactersName"></span></small>
    </div>

    <div class="form-group mb-3">
        <label for="recipeDescription"><strong>Brève description</strong></label>
        <textarea name="recipeDescription" id="recipeDescription" class="form-control form-control-sm" required></textarea>
        <small id="descriptionCharacterCount" class="form-text text-muted">Caractères restants : <span id="remainingCharactersDesc"></span></small>
    </div>

    <div class="form-group mb-3">
        <label for="recipeContent"><strong>Contenu</strong></label>
        <textarea name="recipeContent" id="recipeContent" class="form-control form-control-sm" required></textarea>
        <small id="characterCountDisplay" class="form-text text-muted">Caractères restants : <span id="remainingCharacters"></span></small>
    </div>

    <div class="form-group mb-3">
        <label for="recipeType"><strong>Type de Plat</strong></label><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="recipeType" id="entree" value="Entrée">
            <label class="form-check-label" for="entree">Entrée</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="recipeType" id="platPrincipal" value="Plat Principal">
            <label class="form-check-label" for="platPrincipal">Plat Principal</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="recipeType" id="dessert" value="Dessert">
            <label class="form-check-label" for="dessert">Dessert</label>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="ingredientName"><strong>Nom de l'ingrédient</strong></label>
        <input type="text" id="ingredientName" list="ingredientSuggestions" name="ingredientName" class="form-control form-control-sm" />
        <datalist id="ingredientSuggestions"></datalist>
    </div>

    <ul id="ingredientList" class="list-group mb-3"></ul>
    <input type="hidden" id="ingredientContainer" name="ingredientContainer" value="">

    <div class="form-group mb-3">
        <label for="recipePicture"><strong>Choisir une image</strong></label>
        <input type="file" id="recipePicture" name="recipePicture" class="form-control-file" accept="image/png, image/jpeg" required />
    </div>
    <div class="d-flex justify-content-center mb-5">
        <button type="submit" name="submitRecipe" id="submitRecipeButton" class="btn btn-primary">Envoyer</button>
    </div>
</form>
</div>


<script>
    const maxContentCharacters=512;
    const recipeNameInput = document.getElementById("recipeName");
    const recipeDescriptionInput = document.getElementById("recipeDescription");
    const recipeContentInput = document.getElementById("recipeContent");
    const ingredientName = document.getElementById("ingredientName");
    const ingredientList = document.getElementById("ingredientList");
    const allIngredients = <?php echo json_encode($allIngredient); ?>;
    const ingredientSuggestions = document.getElementById("ingredientSuggestions");
    const submitRecipeButton = document.getElementById("submitRecipeButton");
    let ingredientArray = [];

    ingredientName.addEventListener("input", function() {
        var searchTerm = ingredientName.value.toLowerCase();
        var filteredIngredients = allIngredients.filter(function(ingredient) {
            return ingredient.IN_TITLE.toLowerCase().startsWith(searchTerm);
        });

        ingredientSuggestions.innerHTML = "";

        filteredIngredients.forEach(function(ingredient) {
            var option = document.createElement("option");
            option.value = ingredient.IN_TITLE;
            ingredientSuggestions.appendChild(option);
        });
    });

    ingredientName.addEventListener("keydown", function(event) {
    if (event.key === "Enter" && ingredientName.value.trim() !== "") {
        event.preventDefault();

        var ingredientValue = ingredientName.value.trim();

        var listItem = document.createElement("li");
        listItem.textContent = ingredientValue;
        ingredientList.appendChild(listItem);

        ingredientArray.push(ingredientValue);
        ingredientName.value = "";
       
        ingredientContainer.value = JSON.stringify(ingredientArray);

    }
});


    recipeNameInput.addEventListener("input", function() {
        const currentLength = recipeNameInput.value.length;
        const charactersRemainingName = maxContentCharacters - currentLength;
        remainingCharactersName.textContent = charactersRemainingName;
        if (charactersRemainingName <= 0) {
            alert("Trop de caractere dans le nom de la recette");
            recipeNameInput.value = "";
        }
    });

    recipeDescriptionInput.addEventListener("input", function() {
        const currentLength = recipeDescriptionInput.value.length;
        const charactersRemainingDesc = maxContentCharacters - currentLength;
        remainingCharactersDesc.textContent = charactersRemainingDesc;
        if (charactersRemainingDesc <= 0) {
            alert("Trop de caractere dans la description de la recette");
            recipeDescriptionInput.value = "";

        }
    });

    recipeContentInput.addEventListener("input", function() {
        const currentLength = recipeContentInput.value.length;
        const charactersRemaining = maxContentCharacters - currentLength;
        remainingCharacters.textContent = charactersRemaining;
        if (charactersRemaining <= 0) {
            alert("Trop de caractere dans le contenu de la recette");
            recipeContentInput.value = "";

        }
    });
</script>

<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>