<?php
require_once("bootstrap.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data["prodId"], $data["quantity"])) {
    $prodId = $data["prodId"];
    $quantity = $data["quantity"];
    $orderId = $db->getOrderCart($_SESSION["user_email"])[0]["codOrd"];
    $result = $db->updateCartQuantity($orderId, $prodId, $quantity);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid input"]);
}
?>