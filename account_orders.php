<?php 
require_once("bootstrap.php");

/*
if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
} else {
    $email = $_SESSION["email"];
}*/

$email = "sofia.caberletti@studio.unibo.it";

$templateParams["titolo"] = "Uni Sweet Treats - Account Orders";
$templateParams["nome"] = "ordersContent.php";
$templateParams["ordini"] = $db->getOrdersByEmail($email);
$templateParams["costi"] = $db->getCostsForOrders($email); 
$templateParams["prodotti"] = $db->getProductsForOrders($email);
require("template/base.php");
?>