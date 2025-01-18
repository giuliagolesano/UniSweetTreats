<?php
if(!isset($_SESSION["email"])) {
    header("location: login.php");
    exit;
}
?>

<section class="cart">
    <h2>Your Cart</h2>
    <form>
    </form>
</section>


