<?php
ob_start();
$content = ob_get_clean();
?>
<br><br><br><br><br><br><br><br><br><br>

<?php
    $content = ob_get_clean();
    include $_SESSION['dir'] . '/View/Layout.php';
?>