<?php
// Start output buffering to capture content
ob_start();
?>

<!-- Add line breaks for spacing -->
<br><br><br><br><br><br><br><br>

<!-- Container for text centering -->
<br>
<div class="container text-center">
    <!-- Heading for recipe modification -->
    <h1> Modify Recipe: </h1>
</div>

<!-- Table to display recipe information -->
<table class="table">
    <thead class="thead-dark">
        <!-- Table header row -->
        <tr>
            <th scope="col"> Recipe No. </th>
            <th scope="col"> Title </th>
            <th scope="col"> Category</th>
            <th scope="col"> Summary </th>
            <th scope="col"> Content </th>
        </tr>
    </thead>

    <tbody>
        <?php
        // Start a table row and form for modifying the recipe
        echo '<tr>';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<div >';
        echo '<form method="post" action="' . $_SESSION['dir'] . '"/Controller/ModifyRecipeController.php">';

        // Loop through recipe data and create input fields
        for ($i = 0; $i < (count($_SESSION['radioRecipes'][0])); $i++) {
            switch ($i) {
                case 0:
                    // Display the recipe number as a disabled input field
                    echo '<td> <input class="form-control" type="number"  placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" disabled >  </td> ';
                    break;
                case 2:
                    // Display the title as an input field for modification
                    echo '<td> <input class="form-control" type="text" name="modified_RE_TITLE" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '" > </td> ';
                    break;
                case 4:
                    // Display the category as an input field for modification
                    echo '<td> <input class="form-control" type="text" name="modified_CA_TITLE" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '"></td> ';
                    break;
                case 5:
                    // Display the summary as an input field for modification
                    echo '<td> <input class="form-control" type="text" name="modified_RE_SUMMARY" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '"> </td> ';
                    break;
                case 6:
                    // Display the content as a textarea for modification
                    echo '<td> <input class="form-control" type="textarea" name="modified_RE_CONTENT" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '">  </td> ';
                    break;
            }
        }

        // End of form and table row
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</tr>';
        ?>
    </tbody>
</table>

<!-- Container for buttons with text centering -->
<div class="container text-center">
    <!-- Button to submit the recipe modification -->
    <button type=submit class="btn btn-success btn-block mb-4 " name='validateRecipeModif' value="Validate Modification">Validate</button>
    <!-- Button to cancel the recipe modification -->
    <button type=submit class="btn btn-danger btn-block mb-4 " name='annulateRecipeModif' value="Cancel Modification">Cancel</button>
</div>
</form>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file based on the session directory
include $_SESSION['dir'] . '/View/Layout.php';
?>