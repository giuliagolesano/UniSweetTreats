<nav class="centered-list">
    <ul class="centered-list">
        <?php if(isAdminLoggedIn()): ?>
            <li>
                <a <?php isActive("shop.php");?> href="shop.php">Shop Products List</a>
            </li>
        <?php endif; ?>
        <li>
            <a <?php isActive("account_orders.php");?> href="account_orders.php">Orders</a>
        </li>
        <li>
            <a <?php isActive("account_notifications.php");?> href="account_notifications.php">Notifications</a>
        </li>
    </ul>
</nav>
<h2>Your Orders:</h2>
<?php if(empty($templateParams["ordini"]) || ($templateParams["ordini"][0]["stato"] == "waiting" && count($templateParams["ordini"]) == 1)): ?>
    <p>You have no orders yet.</p>
<?php endif; ?>
<?php foreach($templateParams["ordini"] as $ordine): ?>
    <?php if($ordine["stato"] != "waiting"): ?>
    <div class="order-container">
        <?php if(isUserLoggedIn()): ?>
            <h2>Order <?php echo $ordine["codOrd"]; ?></h2>
        <?php else: ?>
            <h2>Order <?php echo $ordine["codOrd"]; ?> by <?php echo $ordine["e_mail"]; ?></h2>
        <?php endif; ?>
        <div class="order-info">
            <p>Order Date and Time: <?php echo $ordine["giorno"]; ?>, <?php echo $ordine["ora"]; ?></p>
            <p>Status: <?php echo $ordine["stato"]; ?></p>
            <p>Total Order Price: €<?php echo $db->getOrderPrice($ordine["codOrd"]) ?></p>
        </div>
        <div class="products-container">
            <?php foreach($db->getProductsByOrder($ordine["codOrd"]) as $prodotto): ?>
                <div class="product">
                    <img src="<?php echo getImageProduct($prodotto["nomeTip"], $prodotto["foto"]); ?>" alt="Product Image" />
                    <div class="product-details">
                        <h3><?php echo $prodotto["nomeGusto"]; ?> <?php echo $prodotto["nomeTip"]; ?></h3>
                        <?php if($prodotto["fotoAggiunta"] != null): ?>
                            <p>Personalized Photo: <?php echo $prodotto["fotoAggiunta"]; ?></p> 
                        <?php endif; ?>
                        <?php if($prodotto["testo"] != null): ?>
                            <p>Personalized Text: <?php echo $prodotto["testo"]; ?></p> 
                        <?php endif; ?>
                        <?php if($prodotto["topping"] != "none"): ?>
                            <p>Extra Topping: <?php echo $prodotto["topping"]; ?></p> 
                        <?php endif; ?>
                        <p>Quantity: <?php echo $prodotto["quantita"]; ?></p>
                        <p>Total Product Price: €<?php echo $prodotto["prezzoProdottoTot"]; ?></p>
                        <?php if(isUserLoggedIn() && !$db->isAlreadyReviewed($_SESSION["user_email"], $prodotto["codProd"])): ?>
                            <a href="writeReview.php?codProd=<?php echo $prodotto["codProd"]; ?>">Review Product</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>




