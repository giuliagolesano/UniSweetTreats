<?php
require_once("db/database.php");
$db = new DatabaseHelper("localhost", "root", "", "E_commerce_Dolci_Logico", 3306);
define("UPLOAD_DIR", "./resources/")
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
?>