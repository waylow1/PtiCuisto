<?php
// Start output buffering to capture content
ob_start();
?>

<br><br><br>

<!-- Container for flex display with centered content -->
<div class="container-flex d-flex justify-content-center">
    <!-- Section for page content with a specific ID -->
    <section class="page-section collection" id="collection">
        <div class="container">

            <!-- Tabs content -->
            <div class="tab-content">
                <!-- Login tab with a form -->
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <!-- Form for submitting user data to SignInController.php -->
                    <form method="POST" action= <?php echo $_SESSION['dir'] . '/Controller/SignInController.php' ?> >
                        <!-- Input field for a new password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">New Password</label>
                            <input type="password" id="password1" name="password1" class="form-control" required />
                        </div>

                        <!-- Input field for confirming the new password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Confirm Password</label>
                            <input type="password" id="password2"  name="password2" class="form-control" required />
                        </div>

                        <!-- Submit button for the form -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">Submit</button>
                    </form>
                </div>
            </div>
            <!-- End of Tabs content -->
        </div>
    </section>
</div>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file based on the session directory
include $_SESSION['dir'] . '/View/Layout.php';
?>