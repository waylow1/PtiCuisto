<?php
ob_start();
$content = ob_get_clean();
?>
<br><br><br><br><br>


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