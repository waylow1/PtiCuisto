<?php
// Start output buffering to capture content
ob_start();
?>

<!-- Container for the login and registration form -->
<div class="container-flex d-flex justify-content-center">
    <section class="page-section collection" id="collection">
        <div class="container">
            <!-- Pills navigation -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <!-- Tab for login -->
                <li class="nav-item p-1" role="presentation">
                    <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="?action=Login" role="tab" aria-controls="pills-login" aria-selected="true" style="background-color: var(--bs-secondary);">Login</a>
                </li>
                <!-- Tab for registration (active) -->
                <li class="nav-item p-1" role="presentation">
                    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="" role="tab" aria-controls="pills-register" aria-selected="false" style="background-color: var(--bs-primary);">Register</a>
                </li>
            </ul>
            <!-- Pills navigation -->

            <!-- Pills content -->
            <div class="tab-content">
                <!-- Login form -->
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <!-- Form for user registration -->
                    <form method="POST" action=<?php echo $_SESSION['dir'] . '/Controller/SignInController.php' ?> >
                        <!-- Input field for first name -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerName">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" required />
                        </div>

                        <!-- Input field for last name -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerUsername">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" required />
                        </div>

                        <!-- Input field for username -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerUsername">Username</label>
                            <input type="text" id="pseudo" name="pseudo" class="form-control" required />
                        </div>

                        <!-- Input field for email -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerEmail">Email Address</label>
                            <input type="email" id="mail" name="mail" class="form-control" required />
                        </div>

                        <!-- Input field for password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">Password</label>
                            <input type="password" id="password1" name="password1" class="form-control" required />
                        </div>

                        <!-- Input field for confirming password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Confirm Password</label>
                            <input type="password" id="password2"  name="password2" class="form-control" required />
                        </div>

                        <!-- Checkbox for accepting terms -->
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" required />
                            <label class="form-check-label" for="registerCheck">
                                I have read and agree to the Terms of Service
                            </label>
                        </div>

                        <!-- Button for submitting the registration form -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </section>
</div>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file based on the session directory
include $_SESSION['dir'] . '/View/Layout.php';
?>