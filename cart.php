<?php 
require_once("bootstrap.php");

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}

$templateParams["titolo"] = "Uni Sweet Treats - Cart";

$codOrder = $db->getOrderCart($_SESSION["email"])["codOrd"]; //get the order in creation
if(empty($codOrder))) {//if the cart has no orders in creation, create a order first
    if(!($db->createOrder($_SESSION["email"]))) { //if the order creation fails, redirect to shop
        echo "Error creating order";
        header("location: shop.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {//if the request is a post request, load the cart
    $codProd = $_POST["codProd"];
    $quantita = $_POST["quantita"];
    $customText = isset($_POST["custom-text"]) ? $_POST["custom-text"] : '';
    $uploadPhoto = isset($_FILES["upload-photo"]) ? $_FILES["upload-photo"] : null;
    $topping = isset($_POST["topping"]) ? $_POST["topping"] : 'none';
    /* ACTUALLY LOADING THE FILE, NOT JUST THE NAME
    // Process the uploaded photo if any
    if ($uploadPhoto && $uploadPhoto["error"] == UPLOAD_ERR_OK) { //if the photo is uploaded correctly
        $targetDir = "uploads/"; //goes into the designated folder (TO DO???)
        $targetFile = $targetDir . basename($uploadPhoto["name"]);
        move_uploaded_file($uploadPhoto["tmp_name"], $targetFile);
    }*/
    $photoName = '';
    if ($uploadPhoto && $uploadPhoto["error"] == UPLOAD_ERR_OK) { // if the photo is uploaded correctly
        $photoName = basename($uploadPhoto["name"]);
    }

    // Add product to cart
    $db->addProductToCart($codProd, $quantita, $customText, $photoname, $topping);

}

$templateParams["cartItems"] = $db->getCartItems($codOrder);
$templateParams["nome"] = "cartContent.php";

require("template/base.php");
?>
