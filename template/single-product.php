<?php if(empty($userParams["product"])): ?>
    <h2>No products available</h2>
<?php else: 
    $product = $userParams["product"];
?>
    <main class="single-product">
        <div class="product-container">
            <div class="product-image">
                <img src="<?php echo getImageProduct($product['nomeTip'], $product['foto']); ?>" alt="<?php echo $product['descrizione']; ?>">
            </div>
            <div class="product-details">
                <h2><?php echo $product['descrizione']; ?></h2>
                <?php $prezzo = $db->getPriceByProduct($product['nomeGusto'], $product['nomeTip']); ?>
                <p>Price: €<?php echo $prezzo; ?></p>
                <form action="cart.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="codProd" value="<?php echo htmlspecialchars($product['codProd']); ?>">
                    <div class="quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantita" value="1" min="1" max="<?php echo $product['quantita']; ?>">
                    </div>
                    <?php if($product['nomeTip'] == 'cake'): ?>
                        <div class="customization">
                            <label for="custom-text">Customize your cake:</label>
                            <input type="text" id="custom-text" name="custom-text" placeholder="Write your text here...">
                        </div>
                        <div class="photo-upload">
                            <label for="upload-photo">Upload a photo:</label>
                            <input type="file" id="upload-photo" name="upload-photo">
                        </div>
                        <fieldset class="toppings">
                            <legend>Choose your topping:</legend>
                            <div>
                                <input type="radio" id="sprinkles" name="topping" value="sprinkles">
                                <label for="sprinkles">Sprinkles</label>
                            </div>
                            <div>
                                <input type="radio" id="edible-glitters" name="topping" value="edible-glitters">
                                <label for="edible-glitters">Edible glitters</label>
                            </div>
                            <div>
                                <input type="radio" id="none" name="topping" value="none" checked>
                                <label for="none">None</label>
                            </div>
                        </fieldset>
                    <?php endif; ?>
                    <button type="submit" class="add-to-cart">Add to cart</button>
                </form>
            </div>
        </div>
    </main>
<?php endif; ?>
