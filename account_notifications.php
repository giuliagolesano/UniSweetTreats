<?php 
require_once("bootstrap.php");

/*
if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
} else {
    $email = $_SESSION["email"];
}*/

$email = "sofia.caberletti@studio.unibo.it";

$templateParams["titolo"] = "Uni Sweet Treats - Account Notifications";
$templateParams["nome"] = "notificationsContent.php";
$templateParams["notifiche"] = $db->getNotificationsByEmail($email);

require("template/base.php");
?>