<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
</head>
<body>
    <form method="post" action="../Controller/UsersController.php">
        <p>Entrez votre pseudo</p>
        <input type="text" id="pseudo" name="pseudo">
        <p>Entrez votre mot de passe</p>
        <input type="text" id="mdp" name="mdp">
        <input type="submit" value="Envoyer">
    </form>
<?php
 if (isset($users)) {
    echo "Nombre de correspondances trouvées : " . $users;
}
?>
    
</body>
</html>

<?php
    ob_start();
    $content = ob_get_clean();
    include $_SESSION['dir']. '/View/layout.php';
?>
