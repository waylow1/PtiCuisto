<?php
ob_start();

?>

<body id="page-top">

    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="../assets/Pticuisto.png" alt="..." />
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </header>
    <div class="container-flex">
        <!-- collection Section-->
        <section class="page-section collection two-thirds-width" id="collection">
            <div class="container">
                <!-- collection Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dernières recettes</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- collection Grid Items-->
                <div class="row justify-content-center">
                    <!-- collection Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal1">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['0']['RE_IMAGE']?>" alt="..." /> <!--recipe image main page-->
                        </div>
                    </div>
                    <!-- collection Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal2">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['1']['RE_IMAGE']?>" alt="..." />
                        </div>
                    </div>
                    <!-- collection Item 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal3">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['2']['RE_IMAGE']?>" alt="..." />
                        </div>
                    </div>
                    <!-- collection Item 4-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal4">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['3']['RE_IMAGE']?>" alt="..." />
                        </div>
                    </div>
                    <!-- collection Item 5-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal5">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['4']['RE_IMAGE']?>" alt="..." />
                        </div>
                    </div>
                    <!-- collection Item 6-->
                    <div class="col-md-6 col-lg-4">
                        <div class="collection-item mx-auto" data-bs-toggle="modal" data-bs-target="#collectionModal6">
                            <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/dish/<?php echo $Latest['5']['RE_IMAGE']?>" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Editorial Section-->
        <section class="page-section bg-body text-white mb-0 one-third-width" id="editorial">
            <div class="container section-primary">
                <div class="container d-flex align-items-center flex-column">
                    <!-- Masthead Avatar Image-->
                    <img class="masthead-avatar-small mb-5" src="..\assets\Pticuisto.png" alt="..." />
                </div>
                <!-- About Section Heading-->

                <?php if(isset($_SESSION['current_user_informations']['UST_ID'])){
                    if($_SESSION['current_user_informations']['UST_ID'] == 1){
                        echo '<h2 class="page-section-heading text-center text-uppercase text-white"><a href="?action=Edito" style="text-decoration: none;"> Edito </a></h2>';
                    }
                    else{
                        echo '<h2 class="page-section-heading text-center text-uppercase text-white">Edito</h2>';

                    }
                }
                else{
                    echo '<h2 class="page-section-heading text-center text-uppercase text-white">Edito</h2>';
                }
                 ?>

                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto">
                        <?php echo '<p class="lead">' . $_SESSION['edito1']  . '</p>';?>

                    </div>
                    <div class="col-lg-4 me-auto">
                        <?php echo '<p class="lead">' . $_SESSION['edito2']  .'</p> ' ;?>
                        

                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- Footer-->
    <!-- Copyright Section-->

    <!-- collection Modals-->
    <!-- collection Modal 1-->
    <div class="collection-modal modal fade" id="collectionModal1" tabindex="-1" aria-labelledby="collectionModal1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['0']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['0']['RE_IMAGE']?>" alt="..." /><!--reicpe image after click-->
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['0']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection Modal 2-->
    <div class="collection-modal modal fade" id="collectionModal2" tabindex="-1" aria-labelledby="collectionModal2" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['1']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['1']['RE_IMAGE']?>" alt="..." />
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['1']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection Modal 3-->
    <div class="collection-modal modal fade" id="collectionModal3" tabindex="-1" aria-labelledby="collectionModal3" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['2']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['2']['RE_IMAGE']?>" alt="..." />
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['2']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection Modal 4-->
    <div class="collection-modal modal fade" id="collectionModal4" tabindex="-1" aria-labelledby="collectionModal4" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['3']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['3']['RE_IMAGE']?>" alt="..." />
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['3']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection Modal 5-->
    <div class="collection-modal modal fade" id="collectionModal5" tabindex="-1" aria-labelledby="collectionModal5" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['4']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['4']['RE_IMAGE']?>" alt="..." />
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['4']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection Modal 6-->
    <div class="collection-modal modal fade" id="collectionModal6" tabindex="-1" aria-labelledby="collectionModal6" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- collection Modal - Title-->
                                <h2 class="collection-modal-title text-secondary text-uppercase mb-0"><?php echo $Latest['5']['RE_TITLE']?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- collection Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="/assets/dish/<?php echo $Latest['5']['RE_IMAGE']?>" alt="..." />
                                <!-- collection Modal - Text-->
                                <p class="mb-4"><?php echo $Latest['5']['RE_CONTENT']?></p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php'
    ?>
</body>

</html>