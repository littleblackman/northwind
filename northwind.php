<!-- add the header in inc/ -->
<?php
include('inc/_header.php');
include('inc/_function.php');

$products = getProducts();
$orderDetails = getOrderDetails();
$productOrders = getProductsOrders();
$customers = getCustomerOne();

//view the table
//var_dump($orderDetails);
//echo '<pre>';
//print_r($productOrders);
//echo '</pre>';
?>

<header id='header'>
    <!-- table Customer / getCustomer() -->
    <form method='POST' action='customer.php'>
          <label for='customer'>Click to access at the customers</label>
          <button type='submit' class='btn btn-primary btn-sm'>CUSTOMERS</button>
    </form>
    
    <!-- list with products table Products / getProducts()-->
    <form method='POST' action='orderDetail.php'>
        <div id='divProduct'>
            <label for="idProduct">Select your product to have the orders</label>
            <select name='product' id='idProduct'>
                <?php foreach($products as $keyProduct => $product) { ?>
                    <option value='<?=$product["id"];?>' id='codeProduct'><?=$product['codeProduct'] . ' : ' . $product['nameProduct']?></option>
                <?php } ?>  
            </select>
            <button type='submit' class='btn btn-success btn-sm'>ENVOYER</button>     
        </div>
    </form>
    <!-- list with the table customers -->
    <form method='GET' action='orderCustomer.php'>
        <div id='divCustomer'>
            <label for='idCustomers'>Select the customer you want to consult</label>
            <select name='customers' id='idCustomers'>
                <?php foreach($customers as $key => $customer) { ?>
                    <option value='<?=$customer["idCustomer"];?>' id='codeCustomer'><?=$customer['companyName'] . ' : ' . $customer['firstName'] . ' ' .$customer['lastName'] ?></option>
                <?php } ?>  
            </select>
            <button type='submit' class="btn btn-primary btn-sm">ENVOYER</button>
        </div>
    </form>
</header>

<!-- Using Bootstrap -->
<div class='container-fluid'>
    <div class='row'>
        <div class='col-12'>
            <!-- table with table products and table order_details -->
            <span id='spanNorthwind' class='h3'>Products and Order_details</span>
            <table>
                <tr id='tr_header'>
                    <th>idProduct</th>
                    <th>codeProduct</th>
                    <th>nameProduct</th>
                    <th>quantity</th>
                    <th>unit price</th>
                    <th>total price</th>
                </tr>
                <?php foreach($productOrders as $key => $productOrder):?>
                <tr>
                    <td id='id_key'><?=$productOrder['idProduct'];?></td>
                    <td id='id_codeProduct'><?=$productOrder['codeProduct'];?></td>
                    <td id='id_nameProduct'><?=$productOrder['nameProduct'];?></td>
                    <td  id='id_quantity'><?=$productOrder['quantity'];?></td>
                    <td id='id_unitPrice'><?=$productOrder['unitPrice'];?></td>
                    <td id='totalPrice'><?=$productOrder['quantity'] * $productOrder['unitPrice'];?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class='row'>
        <article class='col-12 col-sm-6 col-lg-6'>
            <!-- table products -->
            <h3>PRODUCTS TABLE</h3>
            <?php foreach($products as $keyProduct => $product) { ?>
                   <ul>id Product : <?=$product['id'] ?>
                        <li>code Product : <?=$product['codeProduct'] ?></li>
                        <li>name Product :<?=$product['nameProduct']?></li>
                        <li>cost Product :<?=$product['costStandard']?></li>
                        <li>category     :<?=$product['category']?></li>
                    </ul>
                <?php } ?>
        </article>
        <article class='col-12 col-sm-6 col-lg-6'>
            <h3>ORDER_DETAILS TABLE</h3>    
            <!-- table order_details -->
            <?php foreach($orderDetails as $keyOrderDetail => $orderDetail) { ?>
                   <ul>id Order Detail : <?=$orderDetail['id'] ?>
                        <li>id order   : <?=$orderDetail['idOrder'] ?></li>
                        <li>id Product :<?=$orderDetail['idProduct']?></li>
                        <li>quantity   :<?=$orderDetail['quantity']?></li>
                        <li>unit Price :<?=$orderDetail['unitPrice']?></li>
                    </ul>
                <?php } ?>
        </article>
    </div>    
</div>

<script type="text/javascript" src="inc/scripts.js"></script>

<!-- add the footer in inc/ -->
<?php
include('inc/_footer.php');
?>