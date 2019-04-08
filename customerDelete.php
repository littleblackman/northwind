<?php
include('inc/_function.php');
    $orderId = $_GET['id'];

    setDeleteCustomer($orderId);
    header('location: customer.php');
?>
