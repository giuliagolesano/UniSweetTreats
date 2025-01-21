<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
}

$templateParams["titolo"] = "Uni Sweet Treats - Cart";

if ($_SERVER["REQUEST_METHOD"] == "POST") {//if the request is a post request, load the cart
    if (isset($_POST["codProd"], $_POST["quantita"])) {
        $codOrder = $db->getOrderCart($_SESSION["user_email"]); //get the order in creation
        if(empty($codOrder)) {//if the cart has no orders in creation, create a order first
            $db->createOrder($_SESSION["user_email"]);
        }
        $codProd = $_POST["codProd"];
        $quantita = $_POST["quantita"];
        $customText = isset($_POST["custom-text"]) ? $_POST["custom-text"] : '';
        $uploadPhoto = isset($_FILES["upload-photo"]) ? $_FILES["upload-photo"] : null;
        $topping = isset($_POST["topping"]) ? $_POST["topping"] : 'none';

        $photoName = '';
        if ($uploadPhoto && $uploadPhoto["error"] == UPLOAD_ERR_OK) { // if the photo is uploaded correctly
            $photoName = basename($uploadPhoto["name"]);
        }

        $codOrd = $codOrder["codOrd"]; // get the order in creation 
        // Add product to cart
        $db->addProductToCart($codOrd, $codProd, $quantita, $customText, $photoName, $topping);

        // Unset POST variables after use
        unset($_POST["codProd"], $_POST["quantita"], $_POST["custom-text"], $_FILES["upload-photo"], $_POST["topping"]);
    }
}

if (!empty($codOrder)) {
    $templateParams["cartItems"] = $db->getCartItems($codOrder["codOrd"]); //get the items in the cart
}
else {
    $templateParams["cartItems"] = [];
}
$templateParams["nome"] = "cartContent.php";

require("template/base.php");
?>
