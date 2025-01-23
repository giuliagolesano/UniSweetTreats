<?php
require_once("bootstrap.php");

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data["orderId"])) {
    $orderId = $data["orderId"];
    $result = $db->placeOrder($orderId);
    if ($result) {
        $codNot = $db->getNextNotificationCode();
        $testo = "Your order has been placed";
        $stato = "to_read";
        $giorno = date("Y-m-d");
        $ora = date("H:i:s");
        $email = $_SESSION["user_email"];
        $db->createNotification($codNot, $testo, $stato, $giorno, $ora, $email, $orderId);
        $adminEmails = $db->getAllAdminEmails();
        foreach ($adminEmails as $admin) {
            $adminEmail = $admin["e_mail"];
            $codAgg = $db->getNextUpdateCode();
            $testoAgg = "$email has placed an order $orderId";
            $db->createUpdateAdmin($codAgg, $testoAgg, $stato, $giorno, $ora, $adminEmail);
        }
        $productsWithZeroQuantity = $db->getProductsWithZeroQuantity();
        foreach ($productsWithZeroQuantity as $product) {
            foreach ($adminEmails as $admin) {
                $adminEmail = $admin["e_mail"];
                $codAgg = $db->getNextUpdateCode();
                $testoAgg = "Product {$product['codProd']} is out of stock.";
                $db->createUpdateAdmin($codAgg, $testoAgg, $stato, $giorno, $ora, $adminEmail);
            }
        }
    }
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["success" => false, "message" => "Order ID not set"]);
}
?>