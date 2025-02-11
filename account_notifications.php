<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn() && !isAdminLoggedIn()){
    header("Location: login.php"); 
}

if(isUserLoggedIn()){
    $templateParams["notifiche"] = $db->getNotificationsByEmail($_SESSION["user_email"]);
} else {
    $templateParams["notifiche"] = $db->getUpdatesByEmail($_SESSION["admin_email"]);
}

$templateParams["titolo"] = "Uni Sweet Treats - Account Notifications";
$templateParams["nome"] = "notificationsContent.php";
$templateParams["js"][] = "js/notifications.js";

require("template/base.php");
?>