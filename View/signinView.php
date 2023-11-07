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
                    <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="?action=Login" role="tab" aria-controls="pills-login" aria-selected="true" style="background-color: var(--bs-secondary);">Se connecter</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="" role="tab" aria-controls="pills-register" aria-selected="false" style="background-color: var(--bs-primary);">S'inscrire</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerName">Nom</label>
                            <input type="text" id="registerName" class="form-control" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerUsername">Pseudo</label>
                            <input type="text" id="registerUsername" class="form-control" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerEmail">Adresse Mail</label>
                            <input type="email" id="registerEmail" class="form-control" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">Mot de passe</label>
                            <input type="password" id="registerPassword" class="form-control" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Confirmez mot de passe</label>
                            <input type="password" id="registerRepeatPassword" class="form-control" required />

                        </div>

                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" required />
                            <label class="form-check-label" for="registerCheck">
                                J'ai lu et j'accepte les CGU
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-3">S'inscrire</button>
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