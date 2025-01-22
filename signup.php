<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Uni Sweet Treats - Sign up";
$templateParams["nome"] = "signup-form.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $consent = isset($_POST["consent"]) ? 'S' : 'N';

    if (empty($email) || empty($password) || empty($name) || empty($surname)) {
        $templateParams["errore"] = "Tutti i campi sono obbligatori!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $templateParams["errore"] = "Indirizzo email non valido!";
    } else {
        if ($db->isEmailRegistered($email)) {
            $templateParams["errore"] = "An account with this email already exists!";
        } else {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            $registration = $db->signUpUser($email, $name, $surname, $passwordHashed, $consent);
            if ($registration) {
                header("Location: account_orders.php");
                exit;
            } else {
                $templateParams["errore"] = "Error during registration. Please try again later.";
            }
        }
    }
}

require 'template/base.php';
