<?php
require_once("utils/functions.php");
require_once("db/database.php");

session_start();

$db = new DatabaseHelper("localhost", "root", "", "Unisweettreats", 3306);
define("UPLOAD_DIR", "./resources/");
define("CAKES_DIR", UPLOAD_DIR . "cakes/");
define("CAKES_NOBG_DIR", CAKES_DIR . "NoBG/");
define("GUMMIES_DIR", UPLOAD_DIR . "gummies/");
define("GUMMIES_NOBG_DIR", GUMMIES_DIR . "NoBG/");
define("CUPCAKES_DIR", UPLOAD_DIR . "cupcakes/");
define("CUPCAKES_NOBG_DIR", CUPCAKES_DIR . "NoBG/");
define("COOKIES_DIR", UPLOAD_DIR . "cookies/");
define("COOKIES_NOBG_DIR", COOKIES_DIR . "NoBG/");
define("ICONS_DIR", UPLOAD_DIR . "icons/");
define("ICONS_NOBG_DIR", ICONS_DIR . "NoBG/");

$templateParams["prodotti"] = $db->getAllProducts();
$userParams["articoli"] = $db->getAllProducts();
$templateParams["categorie"] = $db->getCategories();


?>