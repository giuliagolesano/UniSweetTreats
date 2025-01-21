<h3>BEST SELLERS</h3>
<div class="bestSeller">
    <div>
        <?php foreach($templateParams["bestSellers"] as $bestSeller): ?>
            <div>
                <a href="product.php?codProd=<?php echo $bestSeller["codProd"]; ?>">
                    <h4><?php echo strtoupper($bestSeller["nomeTip"]); ?></h4>
                    <img src="<?php echo getImageProduct($bestSeller["nomeTip"], $bestSeller["foto"]); ?>" alt="<?php echo $bestSeller["descrizione"]; ?> Image">
                    <h5><?php echo $bestSeller["descrizione"]; ?></h5>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
