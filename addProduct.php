<?php
require_once("bootstrap.php");

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$templateParams["titolo"] = "Uni Sweet Treats - " . ucfirst($action) . " Product";
$templateParams["nome"] = "product-form.php";
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
        $nomeGusto = $_POST['nomeGusto'];
        $nomeTip = $_POST['nomeTip'];
        $photoName = '';

        if (isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK) {
            $photoName = basename($_FILES['upload-photo']['name']);
            move_uploaded_file($_FILES['upload-photo']['tmp_name'], UPLOAD_DIR . $photoName);
        } elseif ($action === 'modify') {
            $photoName = $product['foto'];
        }

        try {
            $db->addTasteIfNotExists($nomeGusto);

            if ($action === 'add') {
                $codProd = $db->getNextProductCode($nomeTip);
                $db->addProduct($codProd, $name, $description, $price, $photoName, $nomeGusto, $nomeTip);
            } elseif ($action === 'modify') {
                $codProd = $_POST['codProd'];
                $db->updateProductFields($codProd, $name, $description, $price, $photoName, $nomeGusto, $nomeTip);
            }

            header("Location: shop.php");
            exit;
        } catch (Exception $e) {
            $templateParams["errore"] = $e->getMessage();
        }
    }
}

$templateParams["action"] = $action;
$templateParams["product"] = $product;

require("template/base.php");
?>