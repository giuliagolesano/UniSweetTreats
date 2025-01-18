<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Checkout";
$templateParams["nome"] = "";

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}



require("template/base.php");
?>
