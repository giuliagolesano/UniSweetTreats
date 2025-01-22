<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
}

$templateParams["titolo"] = "Uni Sweet Treats - Cart";
$templateParams["js"][]="js/cart.js";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codProd"], $_POST["quantita"])) {
    $codOrder = $db->getOrderCart($_SESSION["user_email"]);
    if(empty($codOrder)) {
        $codOrd = $db->createOrder($_SESSION["user_email"]);
    } else {
        $codOrd = $codOrder[0]["codOrd"];
    }
    $codProd = $_POST["codProd"];
    $quantita = $_POST["quantita"];
    $customText = isset($_POST["custom-text"]) ? $_POST["custom-text"] : '';
    $uploadPhoto = isset($_FILES["upload-photo"]) ? $_FILES["upload-photo"] : null;
    $topping = isset($_POST["topping"]) ? $_POST["topping"] : 'none';

    $photoName = '';
    if ($uploadPhoto && $uploadPhoto["error"] == UPLOAD_ERR_OK) {
        $photoName = basename($uploadPhoto["name"]);
    }
    
    if($db->isProductInCart($codOrd, $codProd)) {
        $db->increaseOfQuantityCartProduct($codOrd, $codProd, $quantita);
    } else {
        $db->addProductToCart($codOrd, $codProd, $quantita, $customText, $photoName, $topping);
    }

    unset($_POST["codProd"], $_POST["quantita"], $_POST["custom-text"], $_FILES["upload-photo"], $_POST["topping"]);
}
$codOrder = $db->getOrderCart($_SESSION["user_email"]);
if (!empty($codOrder)) {
    $order = $codOrder[0]["codOrd"];
    $templateParams["cartItems"] = $db->getCartItems($order);
    $templateParams["codiceOrdine"] = $order;
}
else {
    $templateParams["cartItems"] = [];
    $templateParams["codiceOrdine"] = null;
}

$templateParams["nome"] = "cartContent.php";

require("template/base.php");
?>
