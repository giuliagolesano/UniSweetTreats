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
        <div>
            <h2>Customer Order</h2>
            <p>Order Date: January 18, 2025</p>
            <p>Status: Processing</p>
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
            <div>
                <img src="../resources/cookies/chinnamonCookie.png" alt="Product 2 Image">
                <div>
                    <h3>Product 2</h3>
                    <p>Quantity: 1</p>
                    <p>Total Price: €15.00</p>
                    <button>Review Product</button>
                </div>
            </div>
            <div>
                <img src="../resources/cookies/chocolateChipsCookie.png" alt="Product 3 Image">
                <div>
                    <h3>Product 3</h3>
                    <p>Quantity: 3</p>
                    <p>Total Price: €30.00</p>
                    <button>Review Product</button>
                </div>
            </div>
        </div>
<?php endforeach; ?>