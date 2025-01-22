<div class="single-product">
    <div class="product-container">
        <form action="#" method="POST" enctype="multipart/form-data" class="product-details">
            <h2 class="text-center">
                <?php
                echo ($action === 'modify') ? 'Modify Product' : (($action === 'delete') ? 'Delete Product' : 'Add New Product');
                ?>
            </h2>
            <?php if ($action === 'delete'): ?>
                <p>Are you sure you want to delete this product?</p>
            <?php else: ?>
                <div class="photo-upload mb-3">
                    <label for="upload-photo">Upload photo:</label>
                    <input type="file" id="upload-photo" name="upload-photo" class="form-control">
                    <?php if ($action === 'modify' && !empty($product['foto'])): ?>
                        <p>Current photo: <?php echo htmlspecialchars($product['foto']); ?></p>
                    <?php endif; ?>
                </div>
                <div class="customization mb-3">
                    <label for="name">Product name:</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="<?php echo ($action === 'modify' && !empty($product)) 
                            ? htmlspecialchars($product['nomeGusto'] . ' ' . $product['nomeTip']) 
                            : ''; ?>" 
                        required 
                        class="form-control" 
                        <?php echo ($action === 'delete') ? 'readonly' : ''; ?>>
                </div>
                <div class="customization mb-3">
                    <label for="description">Description:</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="5" 
                        class="form-control" 
                        <?php echo ($action === 'delete') ? 'readonly' : ''; ?>><?php echo ($action === 'modify' && !empty($product)) 
                            ? htmlspecialchars($product['descrizione']) 
                            : ''; ?></textarea>
                </div>
                <div class="quantity mb-3">
                    <label for="price">Price:</label>
                    <input 
                        type="text" 
                        id="price" 
                        name="price" 
                        value="<?php echo ($action === 'modify' && !empty($product)) 
                            ? htmlspecialchars($product['prezzo']) 
                            : ''; ?>" 
                        required 
                        class="form-control" 
                        <?php echo ($action === 'delete') ? 'readonly' : ''; ?>>
                </div>
            <?php endif; ?>
            <input type="hidden" name="codProd" value="<?php echo isset($product['codProd']) ? htmlspecialchars($product['codProd']) : ''; ?>">
            <button type="submit" name="action" value="<?php echo $action; ?>" class="btn btn-<?php echo ($action === 'delete') ? 'danger' : 'primary'; ?>">
                <?php echo ($action === 'delete') ? 'Delete' : (($action === 'modify') ? 'Save' : 'Add Product'); ?>
            </button>
        </form>
    </div>
</div>
