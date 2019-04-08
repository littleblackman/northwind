<?php
    include('inc/_function.php');
    $orderId = $_GET['id'];

    setDeleteOrder($orderId);
    header('location: northwind.php');
?>
