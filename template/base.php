<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?> </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="bestSeller.php">Best Seller</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
            </ul>
        </nav>
        <div>
            <a href="index.php">
            <img src="<?php echo ICONS_DIR . 'logo1.png'; ?>" alt="Uni Sweet Treats Logo">
            </a>
        </div>
        
        <nav>
            <ul>
                <li><a id="searchToggle" href="javascript:void(0)" onclick="toggleSearch()"><img src="<?php echo ICONS_DIR . 'search.png'; ?>" alt="Search"></a></li>
                <li><a href="login.php"><img src="<?php echo ICONS_DIR . 'account.png'; ?>" alt="Login"></a></li>
                <li><a href="cart.php"><img src="<?php echo ICONS_DIR . 'cart.png'; ?>" alt="Cart"></a></li>
            </ul>
        </nav>
    </header>

    <div id="searchBar" style="display: none;">
        <form action="shop.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for products..." class="form-control" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchToggle = document.getElementById("searchToggle");
            const searchBar = document.getElementById("searchBar");

            searchToggle.addEventListener("click", function(event) {
                event.preventDefault();
                searchBar.style.display = searchBar.style.display === "none" ? "block" : "none";
            });
        });
    </script>

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
