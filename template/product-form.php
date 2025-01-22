<div class="single-product">
    <div class="product-container">
        <form action="#" method="POST" enctype="multipart/form-data" class="product-details">
            <h2 class="text-center">Modify Product</h2>
            
            <?php if (!empty($templateParams['product']['foto'])): ?>
                <div class="mb-3">
                    <img src="uploads/<?php echo htmlspecialchars($templateParams['product']['foto']); ?>" alt="Product Image" class="img-fluid mb-3">
                    <input type="hidden" name="existing-photo" value="<?php echo htmlspecialchars($templateParams['product']['foto']); ?>">
                </div>
            <?php endif; ?>
            
            <div class="photo-upload mb-3">
                <label for="upload-photo">Upload photo:</label>
                <input type="file" id="upload-photo" name="upload-photo" class="form-control">
            </div>
            
            <div class="customization mb-3">
                <label for="name">Product name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($templateParams['product']['nomeGusto'] . ' ' . $templateParams['product']['nomeTip']); ?>" readonly class="form-control">
            </div>
            
            <div class="customization mb-3">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" class="form-control"><?php echo htmlspecialchars($templateParams['product']['descrizione']); ?></textarea>
            </div>
            
            <div class="quantity mb-3">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($db->getPriceByProduct($templateParams['product']['nomeGusto'], $templateParams['product']['nomeTip'])); ?>" required class="form-control">
            </div>
            
            <input type="hidden" name="codProd" value="<?php echo htmlspecialchars($templateParams['product']['codProd']); ?>">
            
            <button type="submit" class="btn btn-primary w-100">Save</button>
        </form>
    </div>
</div>
