<?php if(count($templateParams["prodotti"])== 0): ?>
    <h2>Non ci sono prodotti</h2>
<?php 
    else:
        $prodotto = $templateParams["prodotti"][0];
?>
    <div class="product">
        <div class="product-image">
            <img src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" alt="<?php echo $prodotto["nome"]; ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $prodotto["nome"]; ?></h2>
            <p><?php echo $prodotto["descrizione"]; ?></p>
            <p><?php echo $prodotto["prezzo"]; ?></p>
            <p><?php echo $prodotto["quantita"]; ?></p>
            <form action="#" method="POST">
                <input type="hidden" name="id" value="<?php echo $prodotto["id"]; ?>">
                <input type="number" name="quantita" value="1" min="1" max="<?php echo $prodotto["quantita"]; ?>">
                <input type="submit" name="aggiungi" value="Aggiungi al carrello">
            </form>
        </div>
    </div>
<?php endif; ?>

