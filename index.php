<?php 
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Home";
$templateParams["nome"] = "homepageContent.php";

$templateParams["review"] = $db->getRandomReviews();


require("template/base.php");
?>
