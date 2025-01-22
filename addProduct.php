<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - " . ucfirst($action) . " Product";
$templateParams["nome"] = "product-form.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$product = null;

if (($action === 'modify' || $action === 'delete') && isset($_GET['codProd'])) {
    $codProd = $_GET['codProd'];
    $product = $db->getProductByCode($codProd);
    if (!$product) {
        $templateParams["errore"] = "Product not found.";
        $action = 'add';
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];

    if ($action === 'delete' && isset($_POST['codProd'])) {
        $codProd = $_POST['codProd'];
        $db->deleteProduct($codProd);
        header("Location: shop.php");
        exit;
    } elseif ($action === 'add' || $action === 'modify') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $photoName = '';

        if (isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK) {
            $photoName = basename($_FILES['upload-photo']['name']);
            move_uploaded_file($_FILES['upload-photo']['tmp_name'], UPLOAD_DIR . $photoName);
        } elseif ($action === 'modify') {
            $photoName = $product['foto'];
        }

        if ($action === 'add') {
            $db->addProduct($name, $description, $price, $photoName);
        } elseif ($action === 'modify') {
            $db->updateProductFields($codProd, $name, $description, $price, $photoName);
        }

        header("Location: shop.php");
        exit;
    }
}

$templateParams["action"] = $action;
$templateParams["product"] = $product;

require("template/base.php");
?>
