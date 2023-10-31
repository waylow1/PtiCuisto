<?php
    ob_start();

?>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir']. '/View/layout.php';
?>