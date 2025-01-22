<?php 
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
}

$templateParams["titolo"] = "Uni Sweet Treats - Cart";
$templateParams["js"][]="js/cart.js";

if ($_SERVER["REQUEST_METHOD"] == "POST") {//if the request is a post request, load the cart
    if (isset($_POST["codProd"], $_POST["quantita"])) {
        $codOrder = $db->getOrderCart($_SESSION["user_email"]); //get the order in creation
        if(empty($codOrder)) {//if the cart has no orders in creation, create a order first
            $codOrd = $db->createOrder($_SESSION["user_email"]); // create a new order and get the code
        } else {
            $codOrd = $codOrder[0]["codOrd"]; // get the code of the order in creation
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

        //$codOrd = $db->getOrderCart($_SESSION["user_email"]); // get the order in creation
        var_dump($codOrd);
        // Add product to cart
        $db->addProductToCart($codOrd, $codProd, $quantita, $customText, $photoName, $topping);

        // Unset POST variables after use
        unset($_POST["codProd"], $_POST["quantita"], $_POST["custom-text"], $_FILES["upload-photo"], $_POST["topping"]);
    }
}
$codOrder = $db->getOrderCart($_SESSION["user_email"]); //get the order in creation
if (!empty($codOrder)) {
    $order = $codOrder[0]["codOrd"];
    $templateParams["cartItems"] = $db->getCartItems($order); //get the items in the cart
    $templateParams["codiceOrdine"] = $order;
}
else {
    $templateParams["cartItems"] = [];
    $templateParams["codiceOrdine"] = null;
}

$templateParams["nome"] = "cartContent.php";

require("template/base.php");
?>
