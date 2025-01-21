<div id="login-page">
    <div id="signin_img">
        <img src="<?php echo GUMMIES_NOBG_DIR . 'sharkGummyNoBG.png'; ?>" alt="sharkGummy"/>
    </div>
    <div>
        <form action="#" method="POST">
            <h2>Login</h2>
            <?php if(isset($templateParams["errore"])): ?>
                <p><?php echo $templateParams["errore"]; ?></p>
            <?php endif; ?>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            <ul>
                <li>
                    <label for="email">Email:</label><input type="text" id="email" name="email" require/>
                </li>
                <li>
                    <label for="password">Password:</label><input type="password" id="password" name="password" require/>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>
    </div>
</div>

