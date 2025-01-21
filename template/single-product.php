<?php if(empty($userParams["product"])): ?>
    <h2>Non ci sono prodotti</h2>
<?php else:
        $product = $userParams["product"];
?>
    <div class="product">
        <div class="product-image">
            <img src="<?php echo getImageProduct($product["nomeTip"], $product["foto"]); ?>" alt="<?php echo $product["descrizione"]; ?>">
        </div>
        <div class="product-info">
            <?php $prezzo = $db->getPriceByProduct($product["nomeGusto"],$product["nomeTip"]); ?>
            <h2><?php echo $product["descrizione"]; ?></h2>
            <p>Prezzo: €<?php echo $prezzo; ?></p>
            <p>Quantità disponibile: <?php echo $product["quantita"]; ?></p>
            <form action="cart.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="codProd" value="<?php echo htmlspecialchars($product["codProd"]); ?>" />
                <input type="number" name="quantita" value="1" min="1" max="<?php echo $product["quantita"]; ?>" />
                <?php if($product["nome_categoria"] == "cake"): ?>
                    <div>
                        <label for="custom-text">Customize your cake:</label>
                        <input type="text" id="custom-text" name="custom-text" placeholder="Write your text here..." />
                    </div>
                    <div>
                        <label for="upload-photo">Upload a photo:</label>
                        <input type="file" id="upload-photo" name="upload-photo" />
                    </div>
                    <fieldset>
                        <legend>Choose your topping:</legend>
                        <input type="radio" id="sprinkles" name="topping" value="sprinkles" />
                        <label for="sprinkles">Sprinkles</label><br/>
                        <input type="radio" id="edible-glitters" name="topping" value="edible-glitters" />
                        <label for="edible-glitters">Edible glitters</label><br/>
                        <input type="radio" id="none" name="topping" value="none" />
                        <label for="none">None</label><br/>
                    </fieldset>
                <?php endif; ?>
                <input type="submit" name="aggiungi" value="Aggiungi al carrello" />
            </form>
        </div>
    </div>
<?php endif; ?>

