<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("Location: login.php"); //Se l'utente non è loggato, lo reindirizzo alla pagina di login
}

if(isset($_POST["codProd"]) && isset($_POST["review"]) && isset($_POST["rating"])){
    $codProd = $_POST["codProd"];
    $testo = $_POST["review"];
    $valutazione = $_POST["rating"];
}

$db->insertReview($_SESSION["user_email"], $codProd, $testo, $valutazione);

$templateParams["titolo"] = "Uni Sweet Treats - Write Review";
$templateParams["nome"] = "writeReviewContent.php";

header("Location: account_orders.php");

require("template/base.php");
?>