<div class="container login-page">
    <div class="row align-items-center flex-md-row-reverse">
        <div class="col-md-6 text-center signup-image">
            <img src="<?php echo CAKES_NOBG_DIR . 'chocolateCakeNoBG.png'; ?>" alt="chocolateCake" class="img-fluid mb-4" />
        </div>
        <div class="col-md-6">
            <form method="POST">
                <h2 class="text-center">Sign up</h2>
                <?php if (isset($templateParams["errore"])): ?>
                    <p class="text-danger"><?php echo $templateParams["errore"]; ?></p>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname:</label>
                    <input type="text" id="surname" name="surname" class="form-control" required />
                </div>
                <div class="mb-3 form-check d-flex align-items-center">
                    <input type="checkbox" id="consent" name="consent" class="form-check-input me-2" />
                    <label for="consent" class="form-check-label">I want to receive a newsletter!</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
        </div>
    </div>
</div>