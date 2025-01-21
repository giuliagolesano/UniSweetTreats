<nav>
    <ul>
        <?php if(isAdminLoggedIn()): ?>
            <li>
                <a href="shop.php">Shop Products List</a>
            </li><?php endif; ?><li>
            <a href="account_orders.php">Orders</a>
        </li><li>
            <a href="account_notifications.php">Notifications</a>
        </li>
    </ul>
</nav>
<?php foreach($templateParams["ordini"] as $ordine): ?>
    <?php if(isUserLoggedIn()): ?>
        <div>
            <h2>Order <?php echo $ordine["codOrd"]; ?></h2>
            <p>Order Date and Time: <?php echo $ordine["giorno"]; ?>, <?php echo $ordine["ora"]; ?></p>
            <p>Status: <?php echo $ordine["stato"]; ?></p>
            <p>Total Cost: €<?php echo $templateParams["costi"][$ordine["codOrd"]]; ?></p>
            <?php foreach($templateParams["prodotti"][$ordine["codOrd"]] as $prodotto): ?>
                <div>
                    <img src="<?php echo getImageProduct($prodotto["NomeTip"], $prodotto["FotoProdotto"]); ?>" alt="Product Image">
                    <div>
                        <h3><?php echo $prodotto["NomeGusto"]; ?> <?php echo $prodotto["NomeTip"]; ?></h3>
                        <p>Quantity: <?php echo $prodotto["Quantita"]; ?></p>
                        <p>Total Price: €<?php echo $prodotto["PrezzoTotale"]; ?></p>
                        <a href="writeReview.php?codProd=<?php echo $prodotto["CodiceProdotto"]; ?>">Review Product</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div>
            <h2>Order <?php echo $ordine["codOrd"]; ?> by <?php echo $ordine["e_mail"]; ?></h2>
            <p>Order Date and Time: <?php echo $ordine["giorno"]; ?>, <?php echo $ordine["ora"]; ?></p>
            <p>Status: <?php echo $ordine["stato"]; ?></p>
            <p>Total Order Price: €<?php echo $db->getOrderPrice($ordine["codOrd"]) ?></p>
            <?php foreach($db->getProductsByOrder($ordine["codOrd"]) as $prodotto): ?>
                <div>
                    <img src="<?php echo getImageProduct($prodotto["nomeTip"], $prodotto["foto"]); ?>" alt="Product Image">
                    <div>
                        <h3><?php echo $prodotto["nomeGusto"]; ?> <?php echo $prodotto["nomeTip"]; ?></h3>
                        <?php if($prodotto["fotoAggiunta"] != "null"): ?>
                            <p>Personalized Photo: <?php echo $prodotto["fotoAggiunta"]; ?></p>
                        <?php endif; ?>
                        <?php if($prodotto["testo"] != "null"): ?>
                            <p>Personalized Text: <?php echo $prodotto["testo"]; ?></p>
                        <?php endif; ?>
                        <p>Quantity: <?php echo $prodotto["quantita"]; ?></p>
                        <p>Total Product Price: €<?php echo $prodotto["prezzoProdottoTot"]; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>