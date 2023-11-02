<?php
    ob_start();
    if(isset($_SESSION['us_id'])) {
        profile();
    }
    else{
        login();
    }
?>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir']. '/View/layout.php';
?>