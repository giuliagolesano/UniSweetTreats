<div>
    <button type="button" data-bs-toggle="collapse" data-bs-target="#filterShop" aria-expanded="false" aria-controls="filterShop">
        filter
    </button>
    <div class="collapse" id="filterShop">
        <form action="shop.php" method="GET">
            <div>
                <fieldset>
                    <legend>What do you want to include? </legend>
                    <div class="form-check">
                        <label class="form-check-label" for="cakes">Cakes</label>
                        <input class="form-check-input" type="radio" name="include" value="cakes" id="cakes" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cookies">Cookies</label>
                        <input class="form-check-input" type="radio" name="include" value="cookies" id="cookies" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="gummy">Gummy</label>
                        <input class="form-check-input" type="radio" name="include" value="gummy" id="gummy" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cupcakes">Cupcakes</label>
                        <input class="form-check-input" type="radio" name="include" value="cupcakes" id="cupcakes" />
                    </div>
                </fieldset>
            </div>
            <div>
                <label for="minPrice" class="form-label">Minimum price:<span id="MinValue"><?php echo $filterMinPrice; ?></span></label>
                <input type="range" class="form-range" name="minPrice" min="0" max="1000" value="<?php echo $filterMinPrice; ?>" id="minPrice" oninput="updateRangeValue('minPrice')" />
                <label for="maxPrice" class="form-label">Maximum price:<span id="MaxValue"><?php echo $filterMaxPrice; ?></span></label>
                <input type="range" class="form-range" name="maxPrice" min="0" max="1000" value="<?php echo $filterMaxPrice; ?>" id="maxPrice" oninput="updateRangeValue('maxPrice')" />
            </div>
        </form>
    </div>
</div>
<div>
    <div>
        <?php
        // Add product button for admin 
        if (isset($_SESSION["username"]) && isset($_SESSION["admin"]) && $_SESSION["admin"]) {
            echo "
                <div>
                    <a href='addProduct.php'>
                        <div>
                            <div>
                                <h3>Add New Product</h3>
                            </div>
                        </div>
                    </a>
                </div>";
        }
        ?>

        <?php foreach ($userParams["articoliVisualizzati"] as $articolo): ?>
            <div class="col-12 col-sm-6 col-md-4">
                <a href="product.php?id_prodotto=<?php echo $articolo["id_prodotto"]; ?>&versione=<?php echo $articolo["versione"]; ?>">
                    <div class="card h-100 d-flex flex-column">
                        <img src="<?php echo getImagePath($articolo["nome_categoria"], $articolo["immagine"]); ?>" class="card-img-top img-fluid article-image" alt="" />

                        <div class="card-body flex-grow-1">
                            <h3 class="card-title"><?php echo $articolo["nome"]; ?></h3>
                            <p class="card-text"><?php echo $articolo["descrizione"]; ?></p>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="card-text mb-0">Formato: <?php echo $articolo["formato"]; ?></span>
                                <img src="<?php echo getFormatLogoPath($articolo["formato"]); ?>" class="logo-image" alt="" />
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        <?php endforeach; ?>
    </div>
</div>