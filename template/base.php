<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?> </title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
        <div>
            <img src="./resources/logo1.png" alt="Uni Sweet Treats Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#shop">Shop</a></li>
                <li><a href="#best-seller">Best Seller</a></li>
                <li><a href="#about-us">About Us</a></li>
            </ul>
        </nav>
        <nav>
            <ul>
                <li><a href="#search"><img src="./resources/search.png" alt="Search"></a></li>
                <li><a href="#login"><img src="./resources/account.png" alt="Login"></a></li>
                <li><a href="#cart"><img src="./resources/cart.png" alt="Cart"></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php require($templateParams["nome"]); ?>
    </main>

    <footer>
        <h2>Contact Us</h2>
        <p>Email: unisweettreats@unibo.it</p>
        <p>Phone: +123 456 7890</p>
        <p>Address: Via Cesare Pavese 50, 47521, FC</p>
    </footer>
</body>
</html>
