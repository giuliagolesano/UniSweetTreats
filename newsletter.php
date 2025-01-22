<?php
require_once("bootstrap.php");

if (isset($_POST["newsletter_email"])) {
    $email = $_POST["newsletter_email"];

    if ($db->isEmailRegistered($email)) {
        if ($db->updateNewsletterConsent($email)) {
            header("Location: index.php")
        }
    } else {
        header("Location: login.php")
    }
}
?>
