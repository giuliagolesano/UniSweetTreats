<div class="single-product">
    <div class="product-container">
        <form action="#" method="POST" enctype="multipart/form-data" class="product-details">
            <h2 class="text-center">
                <?php
                echo ($action === 'modify') ? 'Modify Product' : (($action === 'delete') ? 'Delete Product' : 'Add New Product');
                ?>
            </h2>
            <?php if (isset($templateParams["errore"])): ?>
                <div class="alert alert-danger">
                    <?php echo $templateParams["errore"]; ?>
                </div>
            <?php endif; ?>
            <?php if ($action === 'delete'): ?>
                <p>Are you sure you want to delete this product?</p>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </div>
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
                        class="form-control">
                </div>
                <div class="customization mb-3">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control"><?php echo ($action === 'modify' && !empty($product)) ? htmlspecialchars($product['descrizione']) : ''; ?></textarea>
                </div>
                <div class="customization mb-3">
                    <label for="price">Price:</label>
                    <input 
                        type="text" 
                        id="price" 
                        name="price" 
                        value="<?php echo ($action === 'modify' && !empty($product)) ? htmlspecialchars($product['prezzo']) : ''; ?>" 
                        class="form-control">
                </div>
                <div class="customization mb-3">
                    <label for="nomeGusto">Taste:</label>
                    <input 
                        type="text" 
                        id="nomeGusto" 
                        name="nomeGusto" 
                        value="<?php echo ($action === 'modify' && !empty($product)) ? htmlspecialchars($product['nomeGusto']) : ''; ?>" 
                        class="form-control">
                </div>
                <div class="customization mb-3">
                    <label for="nomeTip">Type:</label>
                    <select id="nomeTip" name="nomeTip" class="form-control">
                        <option value="cake" <?php echo ($action === 'modify' && $product['nomeTip'] === 'cake') ? 'selected' : ''; ?>>Cake</option>
                        <option value="cookie" <?php echo ($action === 'modify' && $product['nomeTip'] === 'cookie') ? 'selected' : ''; ?>>Cookie</option>
                        <option value="gummy" <?php echo ($action === 'modify' && $product['nomeTip'] === 'gummy') ? 'selected' : ''; ?>>Gummy</option>
                        <option value="cupcake" <?php echo ($action === 'modify' && $product['nomeTip'] === 'cupcake') ? 'selected' : ''; ?>>Cupcake</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            <?php endif; ?>
            <input type="hidden" name="action" value="<?php echo $action; ?>">
            <?php if ($action === 'modify' || $action === 'delete'): ?>
                <input type="hidden" name="codProd" value="<?php echo htmlspecialchars($product['codProd']); ?>">
            <?php endif; ?>
        </form>
    </div>
</div>