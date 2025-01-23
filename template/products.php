<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif; ?>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <div>
        <h3><?php echo $prodotto["nome"]; ?></h3>
        <p><?php echo $prodotto["descrizione"]; ?></p>
        <p><?php echo $prodotto["prezzo"]; ?></p>
        <p><?php echo $prodotto["quantita"]; ?></p>
        <img src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" alt="<?php echo $prodotto["nome"]; ?>" />
    </div>
<?php endforeach; ?>