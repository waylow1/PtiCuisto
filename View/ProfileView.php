<?php
ob_start();
$content = ob_get_clean();

if(isset($_SESSION['username'])  && isset($_SESSION['password'])){
?>

<br><br><br><br><br>
<div class="container-flex">
    <section class="page-section bg-body collection one-third-width" id="user_info">
        <div class="container text-center">
            <!-- Logged user info-->
            <ul class="list-group list-group-flush mb-5">
                <li class="list-group-item">Type de compte : 
                    <?php
                        if($_SESSION['current_user_informations'][1] == 1) {
                            echo ' Administrateur';
                        }
                        elseif($_SESSION['current_user_informations'][1] == 2) {
                            echo ' Utilisateur';
                        }
                        else{
                            echo ' Inactif';
                        } 
                    ?></li>
                <li class="list-group-item">Pseudonyme : <?php echo $_SESSION['current_user_informations']['US_PSEUDO']?></li>
                <li class="list-group-item">Adresse mail : <?php echo $_SESSION['current_user_informations']['US_MAIL']?></li>
                <li class="list-group-item">Prénom : <?php echo $_SESSION['current_user_informations']['US_FIRSTNAME']?></li>
                <li class="list-group-item">Nom : <?php echo $_SESSION['current_user_informations']['US_LASTNAME']?></li>
                <li class="list-group-item">Création du compte : <?php echo $_SESSION['current_user_informations']['US_REGDATE']?></li>
                <li class="list-group-item">Mot de passe : <?php 
                    for($i = 0; $i < strlen($_SESSION['current_user_informations']['US_PASSWORD']); $i++) {
                        echo '•';
                    }
                ?></li>
            </ul>
            <form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php'?>>
                <button type=submit class="btn btn-danger btn-block mb-4 " name='logout' value="Déconnexion">Déconnexion</button>
            </form>
        </div>
    </section>  
    <section class="page-section text-white mb-0 two-thirds-width" id="user_recipe">
        <div class="container text-center section-primary">
                <!-- collection Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Recettes de l'utilisateur</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
<<<<<<< HEAD
            </div>
    </div>
=======
        </div>
    </section>
</div>
>>>>>>> Martin



<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
}
?>