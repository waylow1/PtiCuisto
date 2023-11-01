<?php
ob_start();

?>
<body>
    
</body>
<?php
    $content = ob_get_clean();
    include $_SESSION['dir']. '/View/layout.php';
?>
</html>