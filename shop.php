<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Shop";
$templateParams["nome"] = "shop-list.php";
$templateParams["prodotti"] = $db->getAllProducts();

// Recupera il prezzo dal filtro
$filterPrice = isset($_GET['price']) ? intval($_GET['price']) : 1000;

// Filtra i prodotti in base al prezzo
$filteredProducts = array_filter($templateParams["prodotti"], function ($product) use ($filterPrice) {
    return $product['price'] <= $filterPrice; // Filtra prodotti in base al campo 'price'
});

require("template/base.php");
?>
