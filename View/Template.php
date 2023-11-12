<?php
// Start output buffering to capture content
ob_start();
?>

<!-- HTML body for the page with PHP interspersed -->
<body id="page-top">

    <!-- Masthead section -->
    <header class="masthead bg-primary text-white text-center">
        <!-- Container for masthead content -->
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image -->
            <img class="masthead-avatar mb-5" src="..\assets\Pticuisto.png" alt="..." />
            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </header>

    <!-- Container for the collection section -->
    <div class="container-flex">
        <!-- Collection Section -->
        <section class="page-section collection two-thirds-width" id="collection">
            <!-- Container for collection content -->
            <div class="container">
                <!-- Collection Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Latest Recipes</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Collection Grid Items -->
                <div class="row justify-content-center">
                    <!-- Collection Item 1 -->
                    <!-- ... (repeated structure for each collection item) -->
                </div>
            </div>
        </section>

        <!-- Editorial Section -->
        <section class="page-section bg-body text-white mb-0 one-third-width" id="editorial">
            <!-- Container for editorial content -->
            <div class="container section-primary">
                <!-- Container for masthead content -->
                <div class="container d-flex align-items-center flex-column">
                    <!-- Masthead Avatar Image -->
                    <img class="masthead-avatar-small mb-5" src="..\assets\Pticuisto.png" alt="..." />
                </div>
                <!-- About Section Heading -->
                <!-- ... (structure for About Section heading and content) -->
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <!-- ... (structure for Footer Section) -->

    <!-- Collection Modals -->
    <!-- ... (structure for Collection Modals) -->
    
 <?php
    // Get the content and clean the output buffer
    $content = ob_get_clean();
    // Include the layout file based on the session directory
    include $_SESSION['dir'] . '/View/Layout.php'
    ?>
</body>

</html>