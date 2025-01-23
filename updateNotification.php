<?php
require_once("bootstrap.php");

if(isset($_POST["codNot"])) {
    $codNot = $_POST["codNot"];
    if(isUserLoggedIn()) {
        $result = $db->toggleNotificationState($codNot);
    } else {
        $result = $db->toggleUpdateState($codNot);
    }

    echo json_encode(["success" => $result]);
    header("Location: account_notifications.php");
    exit();
} else {
    echo json_encode(["success" => false]);
}
?>