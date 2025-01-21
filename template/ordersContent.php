<nav>
    <ul>
        <li>
            <a href="account_orders.php">Orders</a>
        </li><li>
            <a href="account_notifications.php">Notifications</a>
        </li>
    </ul>
</nav>
<?php foreach($templateParams["ordini"] as $ordine): ?>
        <div>
            <h2>Order <?php echo $ordine["codOrd"]; ?></h2>
            <p>Order Date and Time: <?php echo $ordine["giorno"]; ?>, <?php echo $ordine["ora"]; ?></p>
            <p>Status: <?php echo $ordine["stato"]; ?></p>
            <p>Total Cost: €<?php echo $templateParams["costi"][$ordine["codOrd"]]; ?></p>
            <?php foreach($templateParams["prodotti"][$ordine["codOrd"]] as $prodotto): ?>
                <div>
                    <img src="<?php echo getImageProduct($prodotto["NomeTip"], $prodotto["foto"]); ?>" alt="Product Image">
                    <div>
                        <h3><?php echo $prodotto["NomeGusto"]; ?> <?php echo $prodotto["NomeTip"]; ?></h3>
                        <p>Quantity: <?php echo $prodotto["Quantita"]; ?></p>
                        <p>Total Price: €<?php echo $prodotto["PrezzoTotale"]; ?></p>
                        <a href="writeReview.php?codProd=<?php echo $prodotto["CodiceProdotto"]; ?>">Review Product</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<?php endforeach; ?>