<?php
ob_start();
?>
<br><br><br><br><br>
<form method="post" enctype="multipart/form-data" action=<?php $_SESSION['dir'] . '/Controller/CreateRecipeController.php' ?>>
    <div class="form-outline mb-4">
        <label class="form-label" for="recipeName">Nom de la Recette</label>
        <input type="text" id="recipeName" name="recipeName" class="form-control" required />
        <div id="nameCharacterCount">Caractères restants : <span id="remainingCharactersName"></span></div>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="recipeDescription">Brève description</label>
        <input type="textarea" name="recipeDescription" id="recipeDescription" class="form-control" required />
        <div id="descriptionCharacterCount">Caractères restants : <span id="remainingCharactersDesc"></span></div>
    </div>


    <div class="form-outline mb-4">
        <label class="form-label" for="recipeContent">Contenu</label>
        <input type="textarea" name="recipeContent" id="recipeContent" class="form-control" required />
        <div id="characterCountDisplay">Caractères restants : <span id="remainingCharacters"></span></div>
    </div>

    <label class="form-label" for="recipeType">Type de Plat</label><br>
    <ul>
        <li><input type="radio" name="recipeType" value="Entrée" />
            <p>Entrée</p>
        </li>
        <li><input type="radio" name="recipeType" value="Plat Principal" />
            <p>Plat Principal</p>
        </li>
        <li><input type="radio" name="recipeType" value="Dessert" />
            <p>Dessert</p>
        </li>
    </ul>

    <div class="form-outline mb-4">
        <label class="form-label" for="ingredientName">Nom de l'ingrédient</label>
        <input type="text" id="ingredientName" list="ingredientSuggestions" name="ingredientName" class="form-control" />
        <datalist id="ingredientSuggestions"></datalist>
    </div>
    <button type="button" name="addIngredientButton" id="addIngredientButton" class="btn btn-primary">Ajouter un ingrédient</button>


    <div class="form-outline mb-4">
        <label class="form-label" for="recipePicture">Choisir une image</label>
        <input type="file" id="recipePicture" name="recipePicture" class="form-control" accept="image/png, image/jpeg" required />
    </div>
    <button type="submit" name="submitRecipe" class="btn btn-primary btn-block mb-3">Envoyer</button>
</form>


<script>
    const addIngredientButton = document.getElementById("addIngredientButton");
    const ingredientName = document.getElementById("ingredientName");
    const url = new URL(window.location.href);
    const maxContentCharacters = 512;
    const recipeNameInput = document.getElementById("recipeName");
    const recipeDescriptionInput = document.getElementById("recipeDescription");
    const recipeContentInput = document.getElementById("recipeContent");
   
    var allIngredient = <?php echo json_encode($allIngredient); ?>;
    var ingredientSuggestions = document.getElementById("ingredientSuggestions");

    console.table(allIngredient);
    ingredientName.addEventListener("input", function() {
        var searchTerm = ingredientName.value.toLowerCase();
        var filteredIngredients = allIngredient.filter(function(ingredient) {
           
            return ingredient.IN_TITLE.toLowerCase().startsWith(searchTerm);
        });
        ingredientSuggestions.innerHTML = "";
        filteredIngredients.forEach(function(ingredient) {   
            var option = document.createElement("option");
            option.value = ingredient.IN_TITLE;
            ingredientSuggestions.appendChild(option);
        });
    });

    addIngredientButton.addEventListener("click", () => {
        if (ingredientName.value == "") {
            return;
        } else {
            window.location.href = url + "&Ingredient=" + `${ingredientName.value}`;
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