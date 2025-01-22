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
        $admin = $db->loginAdmin($_POST["email"], $_POST["password"]);
        if($admin && password_verify($_POST["password"], $admin["password"])){
            registerLoggedAdmin($admin);
        } else {
            $templateParams["errore"] = "Username o password errati";
        }
    }
}

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $db->checkLoginUser($_POST["email"]); //E' un array di array associativi con i dati dell'utente
    if(count($login_result) == 0){ //potrebbe essere un admin
        $login_result = $db->checkLoginAdmin($_POST["email"], $_POST["password"]);
        if(count($login_result) == 0){ //login fallito
            $templateParams["errore"] = "Username o password errati";
        } else { //login riuscito
            registerLoggedAdmin($login_result[0]);
        }
    } else if($user && password_verify($_POST["password"], $user["password"])){ //login riuscito
        registerLoggedUser($login_result[0]);
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