<?php
    include('inc/_header.php');
    include('inc/_function.php');
    $customers = getCustomerOne();
    //echo '<pre>';
        //print_r($customers);
    //echo '<pre>';

?>

<h1>CUSTOMERS TABLE</h1>
    <form method='POST' action='customerCreate.php'>
<button type='submit' class='btn btn-primary btn-sm'>CREATE CUSTOMER</button>
</form>
<br>

<main>
    <table>
        <thead>
            <tr>
                <th>Id Customer</th>
                <th>Company name</th>
                <th>first Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Zip Code</th>
                <th>City</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
           <!-- loop $customers -->
            <?php foreach($customers as $key => $customer):?>
                <tr>
                    <td><?=$customer['idCustomer']; ?></td>
                    <td><?=$customer['companyName']; ?></td>
                    <td><?=$customer['firstName']; ?></td>
                    <td><?=$customer['lastName']; ?></td>
                    <td><?=$customer['address']; ?></td>
                    <td><?=$customer['zipPostalCode'];?></td>
                    <td><?=$customer['city']; ?></td>
                    <td id="id_modify"><a class="href" href="customerModify.php?id=<?=$customer['idCustomer'];?>" onclick="if(!confirm('Voulez-vous Modifier')) return false;">Modify</a></td>
                    <td id="id_delete"><a class="href" href="customerDelete.php?id=<?=$customer['idCustomer'];?>" onclick="if(!confirm('Voulez-vous Supprimer')) return false;">Supprimer</a></td>
                </tr>              
            <?php endforeach; ?> <!-- end loop -->       
        </tbody>  
    </table>  
</main>


<button id='btnBack' class='btn btn-success'><a href="northwind.php">RETURN INDEX</a></button>

<script type="text/javascript" src="inc/scripts.js"></script>

<?php
    include('inc/_footer.php');
?>