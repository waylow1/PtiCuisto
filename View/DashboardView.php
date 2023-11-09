<?php
ob_start();
$content = ob_get_clean();
?>
<br><br><br><br><br>

<h4 class="display-4"> Liste des utilisateurs </h4>
<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <th scope="col"> N° Utilisateur </th>
            <th scope="col"> Type utilisteur </th>
            <th scope="col"> Statut utilisateur </th>
            <th scope="col"> Pseudo </th>
            <th scope="col"> Mail </th>
            <th scope="col"> Prénom </th>
            <th scope="col"> Nom </th>
            <th scope="col"> Date d'inscription </th>
            <th scope="col"> Mot de passe </th>
        </tr> 
    </thead>
    <tbody>
        <?php 
            for($i = 0 ; $i < (count($_SESSION['allUsers']));$i++){
                echo '<tr>';
                for($j  = 0; $j < (count($_SESSION['allUsers'][$i])/2); $j++){
                    echo '<td>' . $_SESSION['allUsers'][$i][$j] . '</td> ' ;                 
                }
                echo '</tr>';

            }
        ?> 
    </tbody>     
   
</table>
        

<h4 class="display-4"> Liste des recettes à accepter </h4>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col"> N° Recette </th>
            <th scope="col"> Statut Recette </th>
            <th scope="col"> Pseudo Utilisateur </th>
            <th scope="col"> Catégorie </th>
            <th scope="col"> Titre </th>
            <th scope="col"> Contenant </th>
            <th scope="col"> Résumé </th>
            <th scope="col"> Date d'inscription </th>
            <th scope="col"> Action </th>
        </tr>
    </thead>
    <tbody>
    <?php 
            for($i = 0 ; $i < (count($_SESSION['recipesToAccept']));$i++){
                echo '<tr>';
                for($j  = 0; $j < (count($_SESSION['recipesToAccept'][$i])/2); $j++){
                    echo '<td>' . $_SESSION['recipesToAccept'][$i][$j] . '</td> ' ;                 
                }
                echo '<td> <button type=submit class="btn btn-success btn-block mb-4 " name="validateRecipe" value="Valider la recette">Valider la Recette</button>';
                echo '</tr>';

            }
        ?> 
    </tbody>
</table>


<form method="post" action=<?php $_SESSION['dir'] . '/Controller/DashboardController.php'?>>
    <button type=submit class="btn btn-danger btn-block mb-4 " name='logout' value="Déconnexion">Déconnexion</button>
    <button type=submit class="btn btn-danger btn-block mb-4 " name='suppression' value="suppression" id="suppr">Supprimer mon compte</button>
</form>

        <script>

        suppr = document.getElementById('suppr');
        suppr.addEventListener("click",() => {
            document.cookie = "confirm=" + escape(confirm("Confirmez la suppression du compte.")) + "; path=/";
            console.log(document.cookie)
        });
        </script>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>