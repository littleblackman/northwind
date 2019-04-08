<?php
    //include('inc/_header.php');
    include('inc/_function.php');
    include('inc/_bdd.php');
    $customerId = $_GET['id'];
    //echo($customerId);
    $customer = setRetrieveCustomer($customerId);

    if (!empty($_POST)){
        //$query = 'UPDATE customers SET company= \'dd\'  WHERE id=1';
        
       $query = 'UPDATE customers SET company="'.$_POST['company'].'", first_name="'.$_POST['first_name'].'",last_name="'.$_POST['last_name'].'",address="'.$_POST['address'].'",zip_postal_code="'.$_POST['zip_postal_code'].'",city="'.$_POST['city'].'"  WHERE id="'.$customerId.'"';
        //$query = 'UPDATE customers SET company="'.$_POST['company'].'", first_name="'.$_POST['first_name'].'",last_name="'.$_POST['last_name'].'",address="'.$_POST['address'].'",zip_postal_code="'.$_POST['zip_postal_code'].'",city="'$_POST['city'].'" WHERE id="'.$customerId.'"';
        $requete = $bdd -> prepare($query);
        $requete -> execute();
    //$bdd = null;
    //placer le header a la fin du test
    header('Location: customer.php');
}

?>




<?php include('inc/_header.php'); ?> 

<section class="container">
    <h1>Create New Customer</h1>  
</section>

<form action="" method="POST" class="form_edit">
	<div class="form-group">
		<label for="">Company</label>
		<input type="text" name="company" value = "<?= $customer['company']; ?>" class="form-control">
	</div>
    <div class="form-group">
		<label for="">First Name</label>
		<input type="text" name="first_name" value = "<?= $customer['first_name']; ?>" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Last Name</label>
		<input type="text" name="last_name" value = "<?= $customer['last_name']; ?>" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Address</label>
		<input type="text" name="address" value = "<?= $customer['address']; ?>" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Zip Code</label>
		<input type="text" name="zip_postal_code" value = "<?= $customer['zip_postal_code']; ?>" class="form-control">
	</div>
    <div class="form-group">
		<label for="">City</label>
		<input type="text" name="city" value = "<?= $customer['city']; ?>" class="form-control">
	</div>
	 <input type="submit" name="submit" value="Submit" class="c_submit">
</form>







<?php
    include('inc/_footer.php');
?>