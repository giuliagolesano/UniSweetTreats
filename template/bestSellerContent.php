<h2 class="bestSeller text-center">BEST SELLERS</h2>
<div class="bestSeller container">
    <div class="row">
        <?php foreach ($templateParams["bestSellers"] as $bestSeller): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card text-center">
                    <a href="product.php?codProd=<?php echo $bestSeller["codProd"]; ?>">
                        <img src="<?php echo getImageProduct($bestSeller["nomeTip"], $bestSeller["foto"]); ?>" class="card-img-top" alt="<?php echo $bestSeller["descrizione"]; ?> Image" />
                        <div class="card-body">
                            <h3 class="card-title"><?php echo strtoupper($bestSeller["nomeTip"]); ?></h3>
                            <h4 class="card-text"><?php echo $bestSeller["descrizione"]; ?></h4>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
