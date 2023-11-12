<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pti Cuisto</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="..\assets\favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<script>
    var AllRecipes = <?php echo json_encode($_SESSION['Recipes']); ?>;
    var getAllIngredients = <?php echo json_encode($_SESSION['Ingredients']); ?>
</script>


<body>
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" style="margin-bottom:50ox" id="mainNav">
        <div class="container">
            <a href="/index.php">
                <?php
                echo '<img class="main-logo" src="..\assets/Logo.png" alt="main_logo">'
                ?>

            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1" id="filter"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/index.php">Accueil</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="?action=AllRecipes">Nos recettes</a></li>
                    <li class="nav-item dropdown mt-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                            Filtres
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color : var(--bs-secondary);">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" data-bs-toggle="modal" data-bs-target="#filterModal1" id="Category">Catégories</a>
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" data-bs-toggle="modal" data-bs-target="#filterModal2" id="Title">Titre</a>
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" data-bs-toggle="modal" data-bs-target="#filterModal3" id="Ingredients">Ingrédients</a>
                        </div>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        if($_SESSION['current_user_informations']['UST_ID'] == 1){
                            echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="?action=Dashboard">Tableau de bord</a></li>';
                        }
                        else{
                        echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="?action=Profile">Mon profil </a></li>';
                        }
                    } 
                    else{
                        echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="?action=Login">Connexion </a></li>';
                    }  ?>
                </ul>

            </div>
        </div>
    </nav>
    <div class="content"><?= $content ?></div>
    <footer class="footer text-center" id="contact">
        <div class="container">
            <div class="d-flex justify-content-center">
            
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Retrouvez-nous ici</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                </div>
                
            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Les bons cuistos 2023</small></div>
    </div>
    <!-- Add this line to include the Bootstrap JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->

        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="../js/scripts.js"></script>




<!-- Modal Category-->
<div class="modal fade" id="filterModal1" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel1">Filtrer par Catégories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="md1">
                <input type="button" id="recipeInputStartDish" value="Entrée">
                <input type="button" id="recipeInputDish" value="Plat">
                <input type="button" id="recipeInputDessert" value="Dessert">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <!-- Ajoutez ici les boutons spécifiques à votre filtre -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Title-->
<div class="modal fade" id="filterModal2" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel2">Filtrer par Titres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="md2">
            <label for="recipeInput">Recherche de recette :</label>
            <input type="text" id="recipeInput" list="recipeListForTitle">
            <datalist id="recipeListForTitle"></datalist>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <!-- Ajoutez ici les boutons spécifiques à votre filtre -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Ingredients-->
<div class="modal fade" id="filterModal3" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel3">Filtrer par Ingrédients</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="md3">
                <!-- Le contenu spécifique du filtre sera ajouté ici dynamiquement -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <!-- Ajoutez ici les boutons spécifiques à votre filtre -->
            </div>
        </div>
    </div>
</div>

<script src="../js/modal.js"></script>
</body>

</html>