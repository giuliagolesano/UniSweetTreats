<?php 
require_once("bootstrap.php");

if(!(isset($_GET["id_prod"]))) {
    header("location: shop.php");
}

$templateParams["titolo"] = "Uni Sweet Treats - Product";
$templateParams["nome"] = "single-product.php";
$templateParams["js"][] = "js/product.js"

$userParams["product"] = current(array_filter($userParams["products"], function($product) {
    return $product["id_prod"] == $_REQUEST["id_prod"];
}))

require("template/base.php");
?>


