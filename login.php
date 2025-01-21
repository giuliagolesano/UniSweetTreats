<?php
require_once("bootstrap.php");

if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    unset($_SESSION["user_email"]);
    unset($_SESSION["admin_email"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["cognome"]);
}

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $db->checkLoginUser($_POST["email"], $_POST["password"]); //E' un array di array associativi con i dati dell'utente
    if(count($login_result) == 0){ //potrebbe essere un admin
        $login_result = $db->checkLoginAdmin($_POST["email"], $_POST["password"]);
        if(count($login_result) == 0){ //login fallito
            $templateParams["errorelogin"] = "Username o password errati";
        } else { //login riuscito
            registerLoggedAdmin($login_result[0]);
        }
    } else { //login riuscito
        registerLoggedUser($login_result[0]);
    }
}

//Controllo se l'utente è già loggato
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