<?php
require_once("bootstrap.php");

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data["orderId"])) {
    $orderId = $data["orderId"];
    $result = $db->placeOrder($orderId);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["success" => false, "message" => "Order ID not set"]);
}
?>