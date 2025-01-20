<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Shop";
$templateParams["nome"] = "shop-list.php";
$templateParams["prodotti"] = $db->getAllProducts();


require("template/base.php");
?>
