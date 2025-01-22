
<?php
/*require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Checkout";
$templateParams["nome"] = "";

if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}



require("template/base.php");
*/?>

<?php
require_once("bootstrap.php");

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data["orderId"])) {
    $orderId = $data["orderId"];
    error_log("Order ID: " . $orderId); // Debugging statement
    $result = $db->placeOrder($orderId);
    echo json_encode(["success" => $result]);
    //header("Location: cart.php");
} else {
    echo json_encode(["success" => false, "message" => "Order ID not set"]);
}
?>