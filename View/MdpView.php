<?php
ob_start();
?>
<br><br><br>
<div class="container-flex d-flex justify-content-center">
    <section class="page-section collection" id="collection">
        <div class="container">

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="POST" action= <?php $_SESSION['dir'] . '/Controller/SignInController.php' ?> >
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">Nouveau mot de passe</label>
                            <input type="password" id="password1" name="password1" class="form-control" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Confirmez le mot de passe</label>
                            <input type="password" id="password2"  name="password2" class="form-control" required />

                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-3">Valider</button>
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