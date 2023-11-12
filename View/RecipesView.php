<?php
// Start output buffering to capture content
ob_start();
?>
<!-- Add line breaks for spacing -->
<br><br><br><br><br>

<!-- Form for creating a recipe with enctype for file upload -->
<form method="post" enctype="multipart/form-data" action=<?php echo $_SESSION['dir'] . '/Controller/CreateRecipeController.php' ?>>
    <!-- Input field for the recipe name -->
    <div class="form-outline mb-4">
        <label class="form-label" for="recipeName">Recipe Name</label>
        <input type="text" id="recipeName" name="recipeName" class="form-control" required />
        <!-- Display remaining characters for the name -->
        <div id="nameCharacterCount">Remaining characters: <span id="remainingCharactersName"></span></div>
    </div>

    <!-- Input field for a brief recipe description -->
    <div class="form-outline mb-4">
        <label class="form-label" for="recipeDescription">Brief Description</label>
        <input type="textarea" name="recipeDescription" id="recipeDescription" class="form-control" required />
        <!-- Display remaining characters for the description -->
        <div id="descriptionCharacterCount">Remaining characters: <span id="remainingCharactersDesc"></span></div>
    </div>

    <!-- Input field for the recipe content -->
    <div class="form-outline mb-4">
        <label class="form-label" for="recipeContent">Content</label>
        <input type="textarea" name="recipeContent" id="recipeContent" class="form-control" required />
        <!-- Display remaining characters for the content -->
        <div id="characterCountDisplay">Remaining characters: <span id="remainingCharacters"></span></div>
    </div>

    <!-- Radio buttons for selecting the type of dish -->
    <label class="form-label" for="recipeType">Type de Plat</label><br>
    <ul>
        <li><input type="radio" name="recipeType" value="Entrée" />
            <p>Appetizer</p>
        </li>
        <li><input type="radio" name="recipeType" value="Plat Principal" />
            <p>Main Course</p>
        </li>
        <li><input type="radio" name="recipeType" value="Dessert" />
            <p>Dessert</p>
        </li>
    </ul>

    <!-- Input field for ingredient name with suggestions -->
    <div class="form-outline mb-4">
        <label class="form-label" for="ingredientName">Ingredient Name</label>
        <input type="text" id="ingredientName" list="ingredientSuggestions" name="ingredientName" class="form-control" />
        <!-- Datalist for displaying ingredient suggestions -->
        <datalist id="ingredientSuggestions"></datalist>
    </div>

    <!-- List for displaying selected ingredients -->
    <ul id="ingredientList"></ul>

    <!-- Input field for uploading an image -->
    <div class="form-outline mb-4">
        <label class="form-label" for="recipePicture">Choose an Image</label>
        <input type="file" id="recipePicture" name="recipePicture" class="form-control" accept="image/png, image/jpeg" required />
    </div>

    <!-- Button to submit the recipe creation -->
    <button type="submit" name="submitRecipe" class="btn btn-primary btn-block mb-3">Submit</button>
</form>

<!-- JavaScript script for ingredient suggestions and character count -->
<script>
    // JavaScript code for handling ingredient suggestions and character count
    // ... (See the provided code for specific comments)
</script>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file based on the session directory
include $_SESSION['dir'] . '/View/Layout.php';
?>