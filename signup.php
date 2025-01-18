<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Sign up";
$templateParams["nome"] = "signup-form.php";

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $passworn = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $consenso = $_POST["consenso"];

    $registration = $db->signUpUser($email, $name, $surname, $password);
    if($registration) {
        header("location: login.php");
        exit;
    }else {
        die("Errore nella registrazione");
        exit;
    }
    exit;
}

require 'template/base.php';
?>