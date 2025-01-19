<div id="signin-page">
    <div id="signin_img">
        <img src="<?php echo CAKES_NOBG_DIR . 'chocolateCakeNoBG.png'; ?>" alt="chocolateCake"/>
    </div>
    <div>
        <form action="#" method="POST">
            <h2>Sign up</h2>
            <?php if(isset($templateParams["errore"])): ?>
                <p><?php echo $templateParams["errore"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="email">Email:</label><input type="text" id="email" name="email" require/>
                </li>
                <li>
                    <label for="password">Password:</label><input type="password" id="password" name="password" require/>
                </li>
                <li>
                    <label for="name">Name:</label><input type="text" id="name" name="name" require/>
                </li>
                <li>
                    <label for="surname">Surname:</label><input type="surname" id="surname" name="surname" require/>
                </li>
                <label for="consent">
                    <input type="checkbox" id="consent" name="consent" />
                    I want to receive a newsletter!
                </label>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>
    </div>
</div>

