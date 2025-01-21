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
<div>
    <?php foreach($templateParams["notifiche"] as $notifica) : ?>
        <div>
            <header>
                <h2>Order <?php echo $notifica["codOrd"]; ?> <?php echo $notifica["stato"]; ?></h2>
                <time datetime="<?php echo $notifica["giorno"]; ?><?php echo $notifica["ora"]; ?>"><?php echo $notifica["giorno"]; ?> <?php echo $notifica["ora"]; ?></time>
            </header>
            <p><?php echo $notifica["testo"]; ?></p>
            <button>Read</button>
        </div>
    <?php endforeach; ?>
</div>