<div>
    <button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#filterMenu" aria-expanded="false" aria-controls="filterMenu">
        filter
    </button>
    <div class="collapse" id="filterMenu">
        <form action="shop.php" method="GET" class="bg-light p-4 rounded">
            <div class="mb-3">
                <fieldset>
                    <legend>What do you want to include? </legend>
                    <div class="form-check">
                        <label class="form-check-label" for="cakes">Cakes</label>
                        <input class="form-check-input" type="checkbox" name="categorie[]" value="cakes" id="cakes" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cookies">Cookies</label>
                        <input class="form-check-input" type="checkbox" name="categorie[]" value="cookies" id="cookies" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="gummy">Gummy</label>
                        <input class="form-check-input" type="checkbox" name="categorie[]" value="gummy" id="gummy" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="cupcakes">Cupcakes</label>
                        <input class="form-check-input" type="checkbox" name="categorie[]" value="cupcakes" id="cupcakes" />
                    </div>
                    <label for="prezzoMin" class="form-label">Prezzo minimo: <span id="prezzoMinValue"><?php echo $filterMinPrice; ?></span></label>
                    <input type="range" class="form-range" name="prezzoMin" min="0" max="50" value="<?php echo $filterMinPrice; ?>" id="prezzoMin" oninput="updateRangeValue('prezzoMin')" />
                    <label for="prezzoMax" class="form-label">Prezzo massimo: <span id="prezzoMaxValue"><?php echo $filterMaxPrice; ?></span></label>
                    <input type="range" class="form-range" name="prezzoMax" min="0" max="50" value="<?php echo $filterMaxPrice; ?>" id="prezzoMax" oninput="updateRangeValue('prezzoMax')" />
                    <button type="submit">Apply Filter</button>
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


        <?php if (!empty($templateParams["prodotti"])): ?>
            <?php 
                $lastCategory = null; 
                foreach ($templateParams["prodotti"] as $product): 
                    if ($lastCategory !== $product["nomeTip"]): 
                        $lastCategory = $product["nomeTip"]; 
                    ?>
                        <h2><?php echo ucfirst($lastCategory); ?></h2>
                    <?php endif; ?>
                    <div>
                        <div>
                            <img src="<?php echo getImageProduct($product["nomeTip"], $product["foto"]); ?>" alt="<?php echo $product["descrizione"]; ?>">
                            <h3><?php echo $product["descrizione"]; ?></h3>
                            <p><?php echo $product["quantita"]; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
        <?php else: ?>
            <p>No products found under €<?php echo $filterPrice; ?></p>
        <?php endif; ?>
    </div>
</div>