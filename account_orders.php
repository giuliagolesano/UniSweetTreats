<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn() && !isAdminLoggedIn()){
    header("Location: login.php"); //Se l'utente non è loggato, lo reindirizzo alla pagina di login
}

if(isUserLoggedIn()){
    $templateParams["ordini"] = $db->getOrdersByEmail($_SESSION["user_email"]);
} else {
    $templateParams["ordini"] = $db->getAllOrders();
}

$templateParams["titolo"] = "Uni Sweet Treats - Account Orders";
$templateParams["nome"] = "ordersContent.php";

require("template/base.php");
?>