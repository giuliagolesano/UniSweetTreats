<div class="container login-page">
    <div class="row align-items-center">
        <div class="col-md-6 text-center d-none d-md-block">
            <img src="<?php echo GUMMIES_NOBG_DIR . 'sharkGummyNoBG.png'; ?>" alt="sharkGummy" class="img-fluid mb-4" />
        </div>
        <div class="col-md-6">
            <form action="#" method="POST">
                <h2 class="text-center">Login</h2>
                <?php if (isset($templateParams["errore"])): ?>
                    <p class="text-danger"><?php echo $templateParams["errore"]; ?></p>
                    <?php unset($templateParams["errore"]);?>
                <?php endif; ?>
                <p class="text-center">Don't have an account? <a href="signup.php">Sign up</a></p>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required />
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>