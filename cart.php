<?php 
require_once("bootstrap.php");

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}

$templateParams["titolo"] = "Uni Sweet Treats - Cart";
$templateParams["nome"] = "cartContent.php";

require("template/base.php");
?>
