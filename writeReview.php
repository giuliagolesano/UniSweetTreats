<?php 
require_once("bootstrap.php");

/*if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
} else {
    $email = $_SESSION["email"];
}*/

$email = "sofia.caberletti@studio.unibo.it";

if(isset($_GET["codProd"])){
    $codProd = $_GET["codProd"];
}

$templateParams["titolo"] = "Uni Sweet Treats - Write Review";
$templateParams["nome"] = "writeReviewContent.php";

require("template/base.php");
?>