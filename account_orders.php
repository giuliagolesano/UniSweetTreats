<?php 
require_once("bootstrap.php");

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}

$templateParams["titolo"] = "Uni Sweet Treats - Account Orders";
$templateParams["nome"] = "ordersContent.php";

require("template/base.php");
?>