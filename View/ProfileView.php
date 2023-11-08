<?php
ob_start();
$content = ob_get_clean();

if(isset($_SESSION['username'])  && isset($_SESSION['password'])){
    $current_user_info = $_SESSION['current_user_info'];
?>

<br><br><br><br><br>
<div class="container-flex">
    <section class="page-section bg-body collection one-third-width" id="user_info">
        <div class="container section-primary text-center">
            <!-- Logged user info-->
            <?php
                print_r($current_user_info);
            ?>
            <form method="post" action=<?php $_SESSION['dir'] . '/Controller/UsersController.php'?>>
                <button type=submit class="btn btn-danger btn-block mb-4 " name='logout' value="Déconnexion">Déconnexion</button>
            </form>
        </div>
    </section>  
    <section class="page-section text-white mb-0 two-thirds-width" id="user_recipe">
        <div class="container text-center">
                <!-- collection Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Recettes de l'utilisateur</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
        </div>
</div>



<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
}
?>
