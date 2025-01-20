<?php 
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Best Seller";
$templateParams["nome"] = "bestSellerContent.php";

$templateParams["bestSellers"] = $db->getBestSellers();


require("template/base.php");
?>
