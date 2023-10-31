<?php 
if (isset($_GET['action']) && $_GET['action']!==''){
    $controller=$_GET['action'];
    require 'Controller/'.$controller.'Controller.php';
}
else {
    include 'View/Template.php';
}
?>
    
