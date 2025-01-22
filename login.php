<?php
require_once("bootstrap.php");

if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    unset($_SESSION["user_email"]);
    unset($_SESSION["admin_email"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["cognome"]);
}

if(isset($_POST["email"]) && isset($_POST["password"])){
    $user = $db->loginUser($_POST["email"]);
    if($user && password_verify($_POST["password"], $user["password"])){
        registerLoggedUser($user);
    } else {
        $admin = $db->loginAdmin($_POST["email"]);
        if($admin && password_verify($_POST["password"], $admin["password"])){
            registerLoggedAdmin($admin);
        } else {
            $templateParams["errorelogin"] = "Username o password errati";
        }
    }
}

if(isUserLoggedIn()){
    header("Location: account_orders.php");
} else {
    if(isAdminLoggedIn()){
        header("Location: shop.php");
    } else {
        $templateParams["titolo"] = "Uni Sweet Treats - Login";
        $templateParams["nome"] = "login-form.php";
    }
}

require 'template/base.php';
?>