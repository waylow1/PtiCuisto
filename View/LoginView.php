<?php
// Start output buffering to capture the HTML content
ob_start();
?>

<!-- Add line breaks for spacing -->
<br><br><br><br><br><br>

<!-- Container for flexible layout with centered content -->
<div class="container-flex d-flex justify-content-center">
    <!-- Section for login and registration -->
    <section class="page-section collection" id="collection">
        <div class="container">
            <!-- Pills navigation -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <!-- Login tab -->
                <li class="nav-item p-1" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <!-- Register tab -->
                <li class="nav-item p-1" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="?action=SignIn" role="tab" aria-controls="pills-register" aria-selected="false" style="background-color: var(--bs-secondary);">Sign Up</a>
                </li>
            </ul>

            <!-- Pills content -->
            <div class="tab-content">
                <!-- Login tab content -->
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <!-- Login form with method and action attributes -->
                    <form method="post" action=<?php $_SESSION['dir'] . '/Controller/LoginController.php' ?>>
                        <br><br>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName"> Username </label>
                            <input type="text" id="loginName" class="form-control" name="username" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" class="form-control" name="password" required />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" href="?action=Profile" class="btn btn-primary btn-block mb-4">Login</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member yet? <a href="?action=SignIn" style="color: blue;">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Pills content -->
        </div>
    </section>
</div>

<?php
// Get the content from the output buffer and clean it
$content = ob_get_clean();

// Include the layout file with the captured content
include $_SESSION['dir'] . '/View/Layout.php';
?>