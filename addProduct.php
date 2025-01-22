<?php
require_once("bootstrap.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codProd = isset($_POST['codProd']) ? $_POST['codProd'] : null;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $uploadedPhoto = isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK ? $_FILES['upload-photo'] : null;
    $existingPhoto = isset($_POST['existing-photo']) ? $_POST['existing-photo'] : null;

    if ($uploadedPhoto) {
        $photoName = basename($uploadedPhoto['name']);
        move_uploaded_file($uploadedPhoto['tmp_name'], "uploads/$photoName");
    } else {
        $photoName = $existingPhoto;
    }

    if ($codProd) {
        $db->updateProductFields($codProd, $name, $description, $price, $photoName);
    }

    header("Location: shop.php");
    exit;
}

if (isset($_GET['codProd'])) {
    $product = $db->getProductByCode($_GET['codProd']);
    if ($product) {
        $templateParams['product'] = $product;
        $templateParams['action'] = 'modify';
    } else {
        die("Product not found.");
    }
} else {
    die("Invalid access: Product ID is required.");
}

$templateParams["titolo"] = "Uni Sweet Treats - Modify Product";
$templateParams["nome"] = "product-form.php";

require("template/base.php");
