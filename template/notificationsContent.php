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
<h2>Your Notifications:</h2>
<?php if (empty($templateParams["notifiche"])): ?>
    <p>You have no notifications yet.</p>
<?php else: ?>
    <div>
        <?php foreach ($templateParams["notifiche"] as $notifica): ?>
            <div class="notification-card row align-items-center mb-4 p-3 bg-light shadow rounded">
                <div class="col-md-6">
                    <h2 class="mb-2 text-start">
                        <?php if (isAdminLoggedIn()): ?>
                            Notification Code: <?php echo $notifica['codNot']?>
                        <?php else: ?>
                            Order Code: <?php echo $notifica['codOrd']; ?>
                        <?php endif; ?>
                    </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="stato mb-2">Status: <?php echo $notifica["stato"]; ?></div>
                    <time datetime="<?php echo $notifica["giorno"] . ' ' . $notifica["ora"]; ?>" class="text-muted">
                        <?php echo $notifica["giorno"] . ' ' . $notifica["ora"]; ?>
                    </time>
                </div>
                <div class="col-12 mt-3">
                    <p class="fs-5"><?php echo $notifica["testo"]; ?></p>
                    <form action="updateNotification.php" method="POST">
                        <input type="hidden" name="codNot" value="<?php echo $notifica["codNot"]; ?>">
                        <button type="submit" class="btn btn-primary notification-button">
                            <?php echo $notifica["stato"] === 'read' ? 'To Read' : 'Read'; ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
