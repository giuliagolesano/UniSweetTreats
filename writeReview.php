<?php 
require_once("bootstrap.php");

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}

$templateParams["titolo"] = "Uni Sweet Treats - Write Review";
$templateParams["nome"] = "writeReviewContent.php";

require("template/base.php");
?>