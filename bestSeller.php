<?php 
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Best Seller";
$templateParams["nome"] = "";

$templateParams["feedback"] = $db->getBestSellers();


require("template/base.php");
?>
