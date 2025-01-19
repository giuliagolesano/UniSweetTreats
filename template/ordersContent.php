<nav>
    <ul>
        <li>
            <a href="account_orders.html">Orders</a>
        </li><li>
            <a href="account_notifications.html">Notifications</a>
        </li>
    </ul>
</nav>
<?php foreach($templateParams["ordini"] as $ordine): ?>
        <section>
            <h2>Order <?php echo $ordine["codOrd"]; ?></h2>
            <p>Order Date and Time: <?php echo $ordine["giorno"]; ?>, <?php echo $ordine["ora"]; ?></p>
            <p>Status: <?php echo $ordine["stato"]; ?></p>
            <p>Total Cost: €75.00</p>
            <div>
                <img src="../resources/cakes/cherryCake.png" alt="Product 1 Image">
                <div>
                    <h3>Product 1</h3>
                    <p>Quantity: 2</p>
                    <p>Total Price: €30.00</p>
                    <button>Review Product</button>
                </div>
            </div>
        </section>
<?php endforeach; ?>