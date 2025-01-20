<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Shop";
$templateParams["nome"] = "shop-list.php";

$filterCategories = [];
foreach ($templateParams["categorie"] as $categoria) {
    $filterCategories[] = $categoria["nomeTip"];
}
$filterMinPrice = 0;
$filterMaxPrice = 50;
$searchKey = "";

if (isset($_GET["prezzoMin"])) {
    $filterMinPrice = $_GET["prezzoMin"];
}
if (isset($_GET["prezzoMax"])) {
    $filterMaxPrice = $_GET["prezzoMax"];
}
if (isset($_GET["categorie"]) && is_array($_GET["categorie"])) {
    $filterCategories = $_GET["categorie"];
}

$searchKey = isset($_GET["search"]) ? trim($_GET["search"]) : "";

$articoliCercati = [];
if (!empty($searchKey)) {
    $articoliCercati = searchProducts($userParams["articoli"], $searchKey);
} else {
    $articoliCercati = $userParams["articoli"];
}

$templateParams["prodotti"] = getFilteredArticles($articoliCercati, $filterCategories, $filterMinPrice, $filterMaxPrice, $db);


require("template/base.php");
?>
