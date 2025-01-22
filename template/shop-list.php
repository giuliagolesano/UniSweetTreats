<?php if(isAdminLoggedIn()): ?>
<nav class="centered-list">
    <ul class="centered-list">
        <li>
            <a class="nav-link btn btn-primary mx-1<?php isActive("shop.php");?>" href="shop.php">Shop Products List</a>
        </li><li>
            <a class="nav-link btn btn-primary mx-1<?php isActive("account_orders.php");?>" href="account_orders.php">Orders</a>
        </li><li>
            <a class="nav-link btn btn-primary mx-1<?php isActive("account_notifications.php");?>" href="account_notifications.php">Notifications</a>
        </li><li>
            <a href="addProduct.php"> Add Product </a>
        </li>
    </ul>
</nav>
<?php endif; ?>
<div class="shop">
    <nav>
        <h3>ALL PRODUCTS</h3>
        <div>
            <button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#filterMenu" aria-expanded="false" aria-controls="filterMenu">
                Filter
            </button>
            <div class="collapse" id="filterMenu">
                <form action="shop.php" method="GET" class="bg-info p-4 rounded">
                    <div class="mb-3">
                        <fieldset>
                            <legend>What do you want to include? </legend>
                            <div class="form-check">
                                <label class="form-check-label" for="cake">Cakes</label>
                                <input class="form-check-input" type="checkbox" name="categorie[]" value="cake" id="cake" />
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="cookie">Cookies</label>
                                <input class="form-check-input" type="checkbox" name="categorie[]" value="cookie" id="cookie" />
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="gummy">Gummy</label>
                                <input class="form-check-input" type="checkbox" name="categorie[]" value="gummy" id="gummy" />
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="cupcake">Cupcakes</label>
                                <input class="form-check-input" type="checkbox" name="categorie[]" value="cupcake" id="cupcake" />
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
    </nav>
    <div class="container">
        <div class="row">
            <?php if (!empty($templateParams["prodotti"])): ?>
                <?php 
                    $lastCategory = null; 
                    foreach ($templateParams["prodotti"] as $product): 
                        if ($lastCategory !== $product["nomeTip"]): 
                            $lastCategory = $product["nomeTip"]; 
                        ?>
                            <div class="col-12">
                                <h2 class="text-center"><?php echo ucfirst($lastCategory); ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card">
                                <a href="product.php?codProd=<?php echo $product["codProd"]; ?>">
                                    <img src="<?php echo getImageProduct($product["nomeTip"], $product["foto"]); ?>" class="card-img-top" alt="<?php echo $product["descrizione"]; ?>">
                                </a>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $product["nomeGusto"]; ?> <?php echo $product["nomeTip"]; ?></h5>
                                    <p class="card-text"><?php echo $product["descrizione"]; ?></p>
                                    <p class="card-text fw-bold">Price: €<?php echo getPrice($product["nomeGusto"], $product["nomeTip"], $db); ?> </p>
                                    <?php if (isAdminLoggedIn()): ?>
                                        <a href="addProduct.php?codProd=<?php echo $product["codProd"]; ?>" class="btn btn-primary btn-sm">Modifica</a>
                                        <button class="btn btn-danger btn-sm delete-button" data-id="<?php echo $product["codProd"]; ?>">Elimina</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No products found</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
