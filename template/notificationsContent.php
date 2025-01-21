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
        <?php if(isAdminLoggedIn()): ?>
            <div>
                <header>
                    <h2>Notification <?php echo $notifica["codNot"]; ?></h2>
                    <div class="stato">Stato: <?php echo $notifica["stato"]; ?></div>
                    <time datetime="<?php echo $notifica["giorno"]; ?><?php echo $notifica["ora"]; ?>"><?php echo $notifica["giorno"]; ?> <?php echo $notifica["ora"]; ?></time>
                </header>
                <p><?php echo $notifica["testo"]; ?></p>
                <form action="updateNotification.php" method="POST" class="notification-form">
                    <input type="hidden" name="codNot" value="<?php echo $notifica["codNot"]; ?>">
                    <button type="submit" class="notifications"><?php echo $notifica["stato"] === 'read' ? 'To Read' : 'Read'; ?></button>
                </form>
            </div>
        <?php else: ?>
            <div>
                <header>
                    <h2>Order <?php echo $notifica["codOrd"]; ?></h2>
                    <div class="stato">Stato: <?php echo $notifica["stato"]; ?></div>
                    <time datetime="<?php echo $notifica["giorno"]; ?><?php echo $notifica["ora"]; ?>"><?php echo $notifica["giorno"]; ?> <?php echo $notifica["ora"]; ?></time>
                </header>
                <p><?php echo $notifica["testo"]; ?></p>
                <form action="updateNotification.php" method="POST" class="notification-form">
                    <input type="hidden" name="codNot" value="<?php echo $notifica["codNot"]; ?>">
                    <button type="submit" class="notifications"><?php echo $notifica["stato"] === 'read' ? 'To Read' : 'Read'; ?></button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>