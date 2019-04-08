<?php
    include('inc/_header.php');
    include('inc/_function.php');
    $id_product = $_POST['product'];
    echo ('product selected : ' . $id_product);
    $productOnes = setOrderOne($id_product);

?>

<h1 class='h3'>ORDER DETAILS FOR THE PRODUCT NUMBER <?=$id_product ?></h1>

<table>
    <tr id='tr_header'>
        <th>id</th>
        <th>order id</th>
        <th>product id</th>
        <th>quantity</th>
        <th>unit price</th>
        <th>delete</th>
    </tr>
    <?php foreach($productOnes as $key => $productOne):?>
    <tr>
        <td id='id_key'><?=$productOne['idOrderOne'];?></td>
        <td id='id_codeProduct'><?=$productOne['idOrder'];?></td>
        <td id='id_Product'><?=$productOne['idProduct'];?></td>
        <td  id='id_quantity'><?=$productOne['quantity'];?></td>
        <td id='id_unitPrice'><?=$productOne['unitPrice'];?></td>
        <td id="id_delete"><a class="href" href="deleteOrderDetail.php?id=<?=$productOne['idOrderOne'];?>" onclick="if(!confirm('Voulez-vous Supprimer')) return false;">Supprimer</a></td> >
    </tr>
    <?php endforeach; ?>
</table>
<hr>
<button id='btnBack' class='btn btn-success'><a href="northwind.php">RETURN INDEX</a></button>



<script type="text/javascript" src="inc/scripts.js"></script>


<?php
    include('inc/_footer.php')
?>