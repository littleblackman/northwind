<?php
    include('inc/_header.php');
    include('inc/_function.php');
    
    $customer = $_GET['customers'];
    echo('customer selected : ' . $customer . ' and traitment successful');
    $customers = getCustomerOrderEmployee($customer);
    
?>

<h1 class='h3'>PRODUCTS</h1>

<table>
    <tr id='tr_header'>
        <th>c company</th>
        <th>e last name</th>
        <th>e first name</th>
        <th>o order date</th>
        <th>o shipping fee</th>
        <th>o taxes</th>
    </tr>
    <?php foreach($customers as $key => $customer):?>
    <tr>
        <td id='cCompany'><?=$customer['cCompany'];?></td>
        <td id='eLastName'><?=$customer['eLastName'];?></td>
        <td id='eFirstName'><?=$customer['eFirstName'];?></td>
        <td  id='oOrderDate'><?=$customer['oOrderDate'];?></td>
        <td id='oShippingFee'><?=$customer['oShippingFee'];?></td>
        <td id='oTaxes'><?=$customer['oTaxes'];?></td>
        
    </tr>
    <?php endforeach; ?>
</table>
<hr>
<button id='btnBack' class='btn btn-success'><a href="northwind.php">RETURN INDEX</a></button>

<script type="text/javascript" src="inc/scripts.js"></script>

<?php
    include('inc/_footer.php');
?>