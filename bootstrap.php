<?php
require_once("db/database.php");
$db = new DatabaseHelper("localhost", "root", "", "E_commerce_Dolci_Logico", 3306);
define("UPLOAD_DIR", "./upload/")
?>