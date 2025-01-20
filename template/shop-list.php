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
                        <input class="form-check-input" type="checkbox" name="include[]" value="cakes" id="cakes" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cookies">Cookies</label>
                        <input class="form-check-input" type="checkbox" name="include[]" value="cookies" id="cookies" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="gummy">Gummy</label>
                        <input class="form-check-input" type="checkbox" name="include[]" value="gummy" id="gummy" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cupcakes">Cupcakes</label>
                        <input class="form-check-input" type="checkbox" name="include[]" value="cupcakes" id="cupcakes" />
                    </div>
                    <label for="price" class="form-label">What about price:<span id="value"><?php echo $filterPrice; ?></span></label>
                    <input type="range" class="form-range" name="price" min="0" max="1000" value="<?php echo $filterPrice; ?>" id="price" oninput="updateRangeValue('price')" />
                </fieldset>
            </div>
        </form>
    </div>
</div>
<div>
    <h3>All products</h3>
    <div>
        
        <?php
        /*if (isset($_SESSION["username"]) && isset($_SESSION["admin"]) && $_SESSION["admin"]) {
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
        }*/
        ?>

        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
            <div>
                <h2>codProd:<?php echo $prodotto["codProd"]; ?></h2>
                    <div>
                        <div>
                            <img src="<?php echo getImageProduct($prodotto["nomeTip"], $prodotto["nomeGusto"]); ?>" alt="<?php echo $prodotto["descrizione"]; ?>">
                            <h3><?php echo $prodotto["descrizione"]; ?></h3>
                            <p><?php echo $prodotto["quantita"]; ?></p>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>