<?php
    
    include('inc/_bdd.php');
    
    //tester avant toute chose si le POST a été validé pour déclencher la requete
    if(!empty($_POST)){
        if ($_POST['company'] === ""){
            echo('il manque la company');
            header('location:customer.php');
        exit();
        }
        $requete = $bdd->prepare('INSERT INTO customers (company, first_name, last_name, address, zip_postal_code, city) VALUES (?, ?, ?, ?, ?, ?)');
        $requete->execute([
            htmlspecialchars($_POST['company']),  //le htmlspecialchars empêche la faille XSS
            htmlspecialchars($_POST['first_name']),
            htmlspecialchars($_POST['last_name']),
            htmlspecialchars($_POST['address']),
            htmlspecialchars($_POST['zip_postal_code']),
            htmlspecialchars($_POST['city']),
        ]);

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
		<input type="text" name="company" class="form-control">
	</div>
    <div class="form-group">
		<label for="">First Name</label>
		<input type="text" name="first_name" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Last Name</label>
		<input type="text" name="last_name" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Address</label>
		<input type="text" name="address" class="form-control">
	</div>
    <div class="form-group">
		<label for="">Zip Code</label>
		<input type="text" name="zip_postal_code" class="form-control">
	</div>
    <div class="form-group">
		<label for="">City</label>
		<input type="text" name="city" class="form-control">
	</div>
	 <input type="submit" name="submit" value="Submit" class="c_submit">
</form>









<?php
    include('inc/_footer.php');
?>