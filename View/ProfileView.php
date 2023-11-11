<?php
ob_start();
$content = ob_get_clean();

if(isset($_SESSION['username'])  && isset($_SESSION['password'])){
?>

<br><br>
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
                <li class="list-group-item">Mot de passe :  <?php 
                    for($i = 0; $i < 8; $i++) {
                        echo '•';
                    }
                    ?>
                    <div class="pt-2">
                        <input type="button" id="modifMDP" class="btn btn-light btn-outline-success btn-block mb-4" value ="Modifier le mot de passe" onclick="location.href ='?action=Mdp';">
                    </div>
                </li>
            </ul>
            <form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php'?>>
                <button type=submit class="btn btn-danger btn-block mb-4" name='logout' value="Déconnexion">Déconnexion</button>
            </form>
        </div>
    </section>  
    <section class="page-section text-white mb-0 two-thirds-width" id="user_recipe">
        <div class="container text-center section-primary" style="overflow:scroll; height:500px">
        <h2 class="page-section-heading text-center text-uppercase text-white">Mes Recettes</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <form method="post" action=<?php $_SESSION['dir'] . '/Controller/ProfileController.php'; ?>>
            <?php 
            if(isset($_SESSION['current_user_recipes'])){ ?>
            
                <?php
                foreach($_SESSION['current_user_recipes'] as $recipes){   
                    
                    if($recipes['RES_ID'] == 2){
                        echo '<p> Etat : Publiée </p>';
                    }
                    else{
                        echo '<p> Etat : En attente de validation </p>' ;
                    }
                    echo '<p> Titre : ' . $recipes['RE_TITLE'] . '</p>';
                    echo '<p> Catégorie : ' . $recipes['CA_TITLE'] . '<br>';
                    echo '<p> Résumé : ' . $recipes['RE_SUMMARY'] . '<br>';
                    echo '<p> Contenu : ' . $recipes['RE_CONTENT'] . '<br>';
                    echo $recipes['RE_IMAGE'] . '<br>';
                    echo '<input class="form-check form-check-input" type="radio" name="radioRecipes[]" value="' . $recipes['RE_ID'] . '"><br>';
                }
                ?>
                <div class="container text-center">
                    <input type="submit" class="btn btn-warning btn-block mb-4" name="modifyRecipe" value="Modifier la recette"> 
                    <input type="submit" class="btn btn-danger btn-block mb-4" name="deleteRecipe" value="Supprimer la recette">

                </div>
          
            <?php }?>
            </form>
            <input type="button" class="btn btn-light btn-outline-success btn-block mb-4 " value ="+ Recette" onclick="location.href ='?action=CreateRecipe';">
        </div>
    </section>
</div>
<section class="small-masthead bg-primary text-white text-center">
    <form method="post" action=<?php $_SESSION['dir'] . '/Controller/ProfileController.php'?>>
        <button type=submit class="btn btn-danger btn-block mb-4" name='suppression' value="suppression" id="suppression">Supprimer mon compte</button>
    </form>
    <script>
    suppr = document.getElementById('suppression');
    suppr.addEventListener("click",() => {
        document.cookie = "confirm=" + escape(confirm("Confirmez la suppression du compte.")) + "; path=/";
    });
    </script>
</section>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
}
?>