<?php 
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Home";
$templateParams["nome"] = "";

$templateParams["feedback"] = $db->getRandomFeedbacks();


require("template/base.php");
?>
