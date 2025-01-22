<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["prodId"])) {
        $prodId = $data["prodId"];
        $codOrd = $db->getOrderCart($_SESSION["user_email"])[0]["codOrd"];
        $success = $db->removeProductFromCart($codOrd, $prodId);

        echo json_encode(["success" => $success]);
        exit;
    }
}

echo json_encode(["success" => false]);
?>
