<?php 
require_once("bootstrap.php");

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
} else {
    $email = $_SESSION["email"];
}

$templateParams["titolo"] = "Uni Sweet Treats - Account Orders";
$templateParams["nome"] = "ordersContent.php";
$templateParams["ordini"] = $dbh->getOrdersByEmail($email);

require("template/base.php");
?>