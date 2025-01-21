<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("Location: login.php"); //Se l'utente non è loggato, lo reindirizzo alla pagina di login
}

if(isset($_GET["codProd"])){
    $codProd = $_GET["codProd"];
}

$templateParams["titolo"] = "Uni Sweet Treats - Write Review";
$templateParams["nome"] = "writeReviewContent.php";

require("template/base.php");
?>