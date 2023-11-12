<?php
// Start output buffering to capture content
ob_start();

// Check if user is logged in
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>

<!-- Add line breaks for spacing -->
<br><br>

<!-- Container for user information -->
<div class="container-flex">
    <!-- Section for displaying user info -->
    <section class="page-section bg-body collection one-third-width" id="user_info">
        <div class="container text-center">
            <!-- List of user information -->
            <ul class="list-group list-group-flush mb-5">
                <!-- Display user account type -->
                <li class="list-group-item">Account Type:
                    <?php
                        // Determine and display account type
                        if($_SESSION['current_user_informations'][1] == 1) {
                            echo ' Administrator';
                        }
                        elseif($_SESSION['current_user_informations'][1] == 2) {
                            echo ' User';
                        }
                        else{
                            echo ' Inactive';
                        } 
                    ?>
                </li>
                <!-- Display user pseudonym -->
                <li class="list-group-item">Pseudonym: <?php echo $_SESSION['current_user_informations']['US_PSEUDO']?></li>
                <!-- Display user email -->
                <li class="list-group-item">Email: <?php echo $_SESSION['current_user_informations']['US_MAIL']?></li>
                <!-- Display user first name -->
                <li class="list-group-item">First Name: <?php echo $_SESSION['current_user_informations']['US_FIRSTNAME']?></li>
                <!-- Display user last name -->
                <li class="list-group-item">Last Name: <?php echo $_SESSION['current_user_informations']['US_LASTNAME']?></li>
                <!-- Display account creation date -->
                <li class="list-group-item">Account Creation Date: <?php echo $_SESSION['current_user_informations']['US_REGDATE']?></li>
                <!-- Display masked password and provide a button to modify it -->
                <li class="list-group-item">Password:  <?php 
                    // Display masked password
                    for($i = 0; $i < 8; $i++) {
                        echo '•';
                    }
                    ?>
                    <div class="pt-2">
                        <!-- Button to navigate to the password modification page -->
                        <input type="button" id="modifMDP" class="btn btn-light btn-outline-success btn-block mb-4" value ="Modify Password" onclick="location.href ='?action=Mdp';">
                    </div>
                </li>
            </ul>
            <!-- Form for user logout -->
            <form method="post" action=<?php echo $_SESSION['dir'] . '/Controller/UsersController.php'?>>
                <button type=submit class="btn btn-danger btn-block mb-4" name='logout' value="Logout">Logout</button>
            </form>
        </div>
    </section>

    <!-- Section for displaying user recipes -->
    <section class="page-section text-white mb-0 two-thirds-width" id="user_recipe">
        <div class="container text-center section-primary" style="overflow:scroll; height:500px">
        <!-- Heading for user recipes -->
        <h2 class="page-section-heading text-center text-uppercase text-white">My Recipes</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Form for modifying or deleting user recipes -->
            <form method="post" action=<?php echo $_SESSION['dir'] . '/Controller/ProfileController.php'; ?>>
            <?php 
            // Check if user has recipes
            if(isset($_SESSION['current_user_recipes'])){ ?>
            
                <?php
                // Loop through user recipes and display information
                foreach($_SESSION['current_user_recipes'] as $recipes){   
                    
                    // Display the state of the recipe (published or pending validation)
                    if($recipes['RES_ID'] == 2){
                        echo '<p> State: Published </p>';
                    }
                    else{
                        echo '<p> State: Pending Validation </p>' ;
                    }
                    // Display recipe details
                    echo '<p> Title: ' . $recipes['RE_TITLE'] . '</p>';
                    echo '<p> Category: ' . $recipes['CA_TITLE'] . '<br>';
                    echo '<p> Summary: ' . $recipes['RE_SUMMARY'] . '<br>';
                    echo '<p> Content: ' . $recipes['RE_CONTENT'] . '<br>';
                    echo $recipes['RE_IMAGE'] . '<br>';
                    // Radio button for selecting the recipe
                    echo '<input class="form-check form-check-input" type="radio" name="radioRecipes[]" value="' . $recipes['RE_ID'] . '"><br>';
                }
                ?>
                <!-- Container for buttons to modify or delete recipes -->
                <div class="container text-center">
                    <!-- Button to submit modification of the selected recipe -->
                    <input type="submit" class="btn btn-warning btn-block mb-4" name="modifyRecipe" value="Modify Recipe"> 
                    <!-- Button to submit deletion of the selected recipe -->
                    <input type="submit" class="btn btn-danger btn-block mb-4" name="deleteRecipe" value="Delete Recipe">

                </div>
          
            <?php }?>
            </form>
            <!-- Button to add a new recipe -->
            <input type="button" class="btn btn-light btn-outline-success btn-block mb-4 " value ="+ Recipe" onclick="location.href ='?action=CreateRecipe';">
        </div>
    </section>
</div>

<!-- Section for account deletion with confirmation script -->
<section class="small-masthead bg-primary text-white text-center">
    <!-- Form for account deletion -->
    <form method="post" action=<?php echo $_SESSION['dir'] . '/Controller/ProfileController.php'?>>
        <!-- Button to submit account deletion with confirmation script -->
        <button type=submit class="btn btn-danger btn-block mb-4" name='suppression' value="suppression" id="suppression">Delete My Account</button>
    </form>
    <!-- JavaScript script for account deletion confirmation -->
    <script>
    suppr = document.getElementById('suppression');
    suppr.addEventListener("click",() => {
        // Set a cookie with a confirmation message
        document.cookie = "confirm=" + escape(confirm("Confirm account deletion.")) + "; path=/";
    });
    </script>
</section>

<?php
    // Get the content and clean the output buffer
    $content = ob_get_clean();
    // Include the layout file based on the session directory
    include $_SESSION['dir'] . '/View/Layout.php';
}
?>
