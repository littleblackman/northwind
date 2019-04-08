<?php
$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$bddName = 'northwind';

//test connection to the database
try 
{
    $bdd = new PDO('mysql:host='.$serverName.';dbname='.$userName.';dbname='.$bddName,$userName, $password);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo('connection à la base de donnée réussie');
    //echo '<script>console.log("connection bdd réussie ....")</script>'; //display like console.log in JS
}
catch(PDOExecption $e)
{
    die('Erreur : ' . $e -> getMessage());
}
?>