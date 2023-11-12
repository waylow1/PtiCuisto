<?php
// Start output buffering to capture the echoed content
ob_start();
$content = ob_get_clean();
?>

<!-- Add multiple line breaks for spacing -->
<br><br><br><br><br>

<!-- Section for displaying the list of users -->
<div class="container text-center">
    <h4 class="display-4">List of Users</h4>
</div>

<!-- Table for displaying user information -->
<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <!-- Table headers for user information -->
            <th scope="col">User ID</th>
            <th scope="col">User Type</th>
            <th scope="col">User Status</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
        </tr> 
    </thead>

    <!-- Form for submitting user-related actions -->
    <form method="post" action="<?php echo $_SESSION['dir'] . '/Controller/DashboardController.php'; ?>">
        <tbody>
            <?php 
                // Loop through the user data and display it in the table
                for ($i = 0; $i < count($_SESSION['allUsers']); $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < count($_SESSION['allUsers'][$i]) / 2; $j++) {
                        echo '<td>' . $_SESSION['allUsers'][$i][$j] . '</td>';
                    }
                    // Add a radio input for user selection
                    echo '<td><input class="form-check form-check-input" type="radio" name="radioUsers" value="'. $_SESSION['allUsers'][$i]['US_ID']. '"></td>';
                    echo '</tr>';
                }
            ?> 
        </tbody>  
    </table>

    <!-- Container for buttons related to user actions -->
    <div class="container text-center">
        <!-- Buttons for modifying or denying a user -->
        <button type="submit" class="btn btn-warning btn-block mb-4" name='modifyUser' value="Modify User">Modify User</button>
        <button type="submit" class="btn btn-danger btn-block mb-4" name='denyUser' value="Delete User">Delete User</button>
    </div>
    </form>

<!-- Section for displaying the list of recipes to accept -->
<div class="container text-center">
    <h4 class="display-4">List of Recipes to Accept</h4>
</div>

<!-- Table for displaying recipes to accept -->
<table class="table">
    <thead class="thead-dark">
        <tr>
            <!-- Table headers for recipe information -->
            <th scope="col">Recipe ID</th>
            <th scope="col">Recipe Status</th>
            <th scope="col">User Username</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Summary</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <!-- Form for submitting recipe-related actions -->
    <form method="post" action="<?php echo $_SESSION['dir'] . '/Controller/DashboardController.php'; ?>">
        <tbody>
            <?php   
                // Loop through the recipes to accept and display them in the table
                for ($i = 0; $i < count($_SESSION['recipesToAccept']); $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < count($_SESSION['recipesToAccept'][$i]) / 2; $j++) {
                        echo '<td>' . $_SESSION['recipesToAccept'][$i][$j] . '</td>';
                    }
                    // Add a checkbox for recipe selection
                    echo '<td><input class="form-check form-check-input" type="checkbox" name="checkboxesRecipe[]" value="'. $_SESSION['recipesToAccept'][$i]['RE_ID']. '"></td>';
                    echo '</tr>';
                }
            ?>        
        </tbody>
    </table>

    <!-- Container for buttons related to recipe actions -->
    <div class="container text-center">
        <!-- Buttons for validating or denying recipes -->
        <button type="submit" class="btn btn-success btn-block mb-4" name='validateRecipe' value="Validate Recipe">Validate Recipe(s)</button>
        <button type="submit" class="btn btn-danger btn-block mb-4" name='denyRecipe' value="Delete Recipe">Delete Recipe(s)</button>
    </div>
    </form>

<!-- Section for displaying the list of all recipes -->
<div class="container text-center">
    <h4 class="display-4">List of Recipes</h4>
</div>

<!-- Table for displaying all recipes -->
<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <!-- Table headers for recipe information -->
            <th scope="col">Recipe ID</th>
            <th scope="col">Recipe Status</th>
            <th scope="col">User Username</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Summary</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Action</th>
        </tr> 
    </thead>

    <!-- Form for submitting actions related to individual recipes -->
    <form method="post" action="<?php echo $_SESSION['dir'] . '/Controller/DashboardController.php'; ?>">
        <tbody>
            <?php 
                // Loop through all recipes and display them in the table
                foreach ($_SESSION['allRecipes'] as $recipe) {
                    echo '<tr>';
                    // Display individual recipe details
                    echo '<td>' . $recipe['RE_ID'] . '</td>';
                    echo '<td>' . $recipe['RES_ID'] . '</td>';
                    echo '<td>' . $recipe['US_PSEUDO'] . '</td>';
                    echo '<td>' . $recipe['CA_TITLE'] . '</td>';
                    echo '<td>' . $recipe['RE_TITLE'] . '</td>';
                    echo '<td>' . $recipe['RE_CONTENT'] . '</td>';
                    echo '<td>' . $recipe['RE_SUMMARY'] . '</td>';
                    echo '<td>' . $recipe['RE_REGDATE'] . '</td>';
                    
                    // Add a radio input for recipe selection
                    echo '<td><input class="form-check form-check-input" type="radio" name="radioRecipes" value="'. $recipe['RE_ID']. '"></td>';
                    echo '</tr>';
                }
            ?> 
        </tbody>  
    </table>

    <!-- Container for buttons related to recipe actions -->
    <div class="container text-center">
        <!-- Buttons for modifying or deleting individual recipes -->
        <button type="submit" class="btn btn-warning btn-block mb-4" name='modifyRecipe' value="Modify Recipe">Modify Recipe</button>
        <button type="submit" class="btn btn-danger btn-block mb-4" name='deleteRecipe' value="Delete Recipe">Delete Recipe</button>
    </div>
    </form>

<!-- Form for user actions such as logout or account deletion -->
<form method="post" action="<?php echo $_SESSION['dir'] . '/Controller/DashboardController.php'; ?>">
    <button type="submit" class="btn btn-danger btn-block mb-4" name='logout' value="Logout">Logout</button>
    <button type="submit" class="btn btn-danger btn-block mb-4" name='suppression' value="deletion" id="suppr">Delete My Account</button>
</form>

<!-- JavaScript script for handling account deletion confirmation -->
<script>
    suppr = document.getElementById('suppr');
    suppr.addEventListener("click", () => {
        document.cookie = "confirm=" + escape(confirm("Confirm account deletion.")) + "; path=/";
        console.log(document.cookie)
    });
</script>

<?php
// Get the buffered content and clean the output buffer
$content = ob_get_clean();
// Include the layout file
include $_SESSION['dir'] . '/View/Layout.php';
?>
