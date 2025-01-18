<?php 
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Home";
$templateParams["nome"] = "homepageContent.php";

$templateParams["feedback"] = $db->getRandomFeedbacks();


require("template/base.php");
?>
