<?php 
require_once("bootstrap.php");

if(!(isset($_GET["codProd"]))) {
    header("location: shop.php");
}

$templateParams["titolo"] = "Uni Sweet Treats - Product";
$templateParams["nome"] = "single-product.php";

$userParams["product"] = current(array_filter($userParams["articoli"], function($product) {
    return $product["codProd"] == $_REQUEST["codProd"];
}));

$templateParams["reviews"] = $db->getReviewsByProduct($userParams["product"]["codProd"]);

require("template/base.php");
?>