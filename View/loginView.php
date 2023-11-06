<?php
ob_start();

?>
<br><br><br>
<div class="container-flex d-flex justify-content-center">
    <section class="page-section collection" id="collection">
        <div class="container">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="" role="tab" aria-controls="pills-login" aria-selected="true">Se connecter</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="?action=SignIn" role="tab" aria-controls="pills-register" aria-selected="false" style="background-color: var(--bs-secondary);">S'inscrire</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="post" action= <?php $_SESSION['dir'] . '/Controller/LoginController.php' ?> >
                        <br><br>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName"> Pseudo </label>
                            <input type="text" id="loginName" class="form-control" name="username" required />

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginPassword">Mot de passe</label>
                            <input type="password" id="loginPassword" class="form-control" name ="password" required />
                        </div>

                        <!-- 2 column grid Layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                    <label class="form-check-label" for="loginCheck"> Rester connecté</label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!" style="color: blue;">Mot de passe oublié?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit"  class="btn btn-primary btn-block mb-4">Se connecter</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Pas encore membre? <a href="?action=SignIn" style="color: blue;">S'inscrire</a></p>

                        </div>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
</div>

<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>