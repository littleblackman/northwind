<?php


//table products SELECT all
//@return array $products
function getProducts() {
    include_once('_bdd.php');
    $query = 'SELECT * FROM products';
    $requete = $bdd ->prepare($query);
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)) {  //récup ony the field names to avoid duplicate
        $product = [  //create an array
            'id'           => $row['id'],
            'codeProduct'  => $row['product_code'],
            'nameProduct'  => $row['product_name'],
            'costStandard' => $row['standard_cost'],
            'category'     => $row['category']
        ];
        $products[] = $product; //create an array for each line
    }
    $requete -> closeCursor();
    if (isset($products)) {
        return $products;
    } else {
        echo(' but no datas');
        echo('<button id="btnNoData"><a href="northwind.php">RETOUR INDEX</a></button>');
        exit();
    }
    echo('traitement terminé');
}

//table order_details SELECT all
//@return array $orderDetails
function getOrderDetails(){
    include('_bdd.php');
    $query = 'SELECT * FROM order_details';
    $requete = $bdd -> prepare($query);
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)) {
        $orderDetail = [
            'id' => $row['id'],
            'idOrder' => $row['order_id'],
            'idProduct' => $row['product_id'],
            'quantity' => $row['quantity'],
            'unitPrice'   => $row['unit_price']
        ];
        $orderDetails[] = $orderDetail;
    }
    $requete -> closeCursor();
    return $orderDetails;
}

//Table product + order_details SELECT columns
//@return array
function getProductsOrders() {
    include('_bdd.php');
    $query = 'SELECT P.id AS idtableP, P.product_code AS codetableP, P.product_name AS nametableP, O.quantity AS quantityOrder, O.unit_price AS unitPriceOrder FROM products P, order_details O WHERE P.id = O.product_id';
    $requete = $bdd -> prepare($query);
    
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)) {
        $productOrder = [
            'idProduct'   => $row['idtableP'],
            'codeProduct' => $row['codetableP'],
            'nameProduct' => $row['nametableP'],
            'quantity'    => $row['quantityOrder'],
            'unitPrice'   => $row['unitPriceOrder']
        ];
        $productOrders[] = $productOrder;
    }
    $requete -> closeCursor();
    return $productOrders;
}

//table order_detail SELECT with id table product
//@return array
function setOrderOne($value) {
    include_once('_bdd.php');
    $query = 'SELECT id, order_id, product_id,quantity, unit_price FROM order_details WHERE product_id= :id';
    $requete = $bdd ->prepare($query);
    $requete -> bindValue(':id', $value, PDO::PARAM_INT);
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)) {  //récup ony the field names to avoid duplicate
        $orderOne = [  //create an array
            'idOrderOne'=> $row['id'],
            'idOrder'   => $row['order_id'],
            'idProduct' => $row['product_id'],
            'quantity'  => $row['quantity'],
            'unitPrice' => $row['unit_price']
        ];
        $orderOnes[] = $orderOne; //create an array for each line
    }
    $requete -> closeCursor();
     if (isset($orderOnes)) {
        return $orderOnes;
    } else {
        echo(' but no datas');
        echo('<button id="btnNoData"><a href="northwind.php">RETOUR INDEX</a></button>');
        exit();
    }
    echo(' and traitment finished');
}

//table customer, employee and orders SELECT with Id customer in page northwind.php
//@return array
function getCustomerOrderEmployee($value){
    include('inc/_bdd.php');
    $query = 'SELECT c.id AS cIdCustomer, c.company AS cCompany, c.last_name AS cLastName, c.first_name AS cFirtsName, e.id AS eIdEmployee, e.company AS eCompany, e.last_name AS eLastName, e.first_name AS eFirstName, o.id AS oIdOrder, o.employee_id AS oIdEmployee, o.customer_id AS oIdCustomer, o.order_date AS oOrderDate, o.shipping_fee AS oShippingFee, o.taxes AS oTaxes FROM employees e, orders o, customers c WHERE o.employee_id = e.id AND c.id = o.customer_id AND c.id= :idCustomer';
    $requete = $bdd -> prepare($query);
    $requete -> bindValue(':idCustomer', $value, PDO::PARAM_INT);
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)) {  //récup ony the field names to avoid duplicate
        $customerOrderEmployee = [  //create an array
            'cCompany'     => $row['cCompany'],
            'eLastName'    => $row['eLastName'],
            'eFirstName'   => $row['eFirstName'],
            'oOrderDate'   => $row['oOrderDate'],
            'oShippingFee' => $row['oShippingFee'],
            'oTaxes'       => $row['oTaxes']
        ];
        $customerOrderEmployees[] = $customerOrderEmployee; //create an array for each line
    }
    $requete -> closeCursor();
    if (isset($customerOrderEmployees)) {
        return $customerOrderEmployees;
    } else {
        echo(' but no datas');
        echo('<button id="btnNoData"><a href="northwind.php">RETOUR INDEX</a></button>');
        exit();
    }
    
}

//table customers with SELECT with id 
//@return array
function getCustomerOne() {
    include('inc/_bdd.php');
    $query = 'SELECT * FROM customers';
    $requete = $bdd -> prepare($query);
    $requete -> execute();
    while ($row = $requete -> fetch(PDO::FETCH_ASSOC)){
        $customerOne = [ //create an array
            'idCustomer'    => $row['id'],
            'companyName'   => $row['company'],
            'firstName'     => $row['first_name'],
            'lastName'      => $row['last_name'],
            'address'       => $row['address'],
            'zipPostalCode' => $row['zip_postal_code'],
            'city'          => $row['city']
        ];
        $customerOnes[] = $customerOne;
    }
    $requete -> closeCursor();
    return $customerOnes;
}

//REQUEST DELETE ELEMENTS IN TABLE ORDER
function setDeleteOrder($value) {
    include('inc/_bdd.php');
    $query = 'DELETE FROM order_details WHERE id= :id LIMIT 1';
    $requete = $bdd -> prepare($query);
    $requete -> bindValue(':id', $value, PDO::PARAM_INT);
    $requete -> execute();
    $requete -> closeCursor();
}

//REQUEST DELETE ELEMENTS IN TABLE CUSTOMER
function setDeleteCustomer($value) {
    include('inc/_bdd.php');
    $query = 'DELETE FROM customers WHERE id= :id LIMIT 1';
    $requete = $bdd -> prepare($query);
    $requete -> bindValue(':id', $value, PDO::PARAM_INT);
    $requete -> execute();
    $requete -> closeCursor();
}

//REQUEST MODIFY DATA TABLE CUSTOMER WITH ID
function setRetrieveCustomer($id){
    include('_bdd.php');

    $query = "SELECT * FROM customers WHERE id = :id ";
    $req = $bdd -> prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req -> execute();

    while ($row = $req -> fetch(PDO::FETCH_ASSOC)){
        $customer = [
            'id'              => $row['id'],
            'company'         => $row['company'],
            'first_name'      => $row['first_name'],
            'last_name'       => $row['last_name'],
            'address'         => $row['address'],
            'zip_postal_code' => $row['zip_postal_code'],
            'city'            => $row['city']
            ];
    return $customer;    
    }
}

