<div class="container cart mt-4">
    <h2 class="text-center mb-4">Your Cart</h2>
    <?php if (empty($templateParams["cartItems"])): ?>
        <h3 class="text-center">Your cart is empty!</h3>
    <?php else: 
        $subtotal = 0;
        foreach ($templateParams["cartItems"] as $item): 
            $totalPrice = $item["quantita"] * $item["prezzo"];
            $subtotal += $totalPrice;
            $maxQuant = $db->getMaxQuantity($item["codProd"]);
    ?>
        <div class="cart-item row align-items-center mb-4 p-3 bg-light shadow rounded">
            <div class="col-md-4 text-center d-flex justify-content-center">
                <img src="<?php echo getImageProduct($item["nomeTip"], $item["foto"]); ?>" alt="<?php echo htmlspecialchars($item["descrizione"]); ?>" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-md-start"><?php echo htmlspecialchars($item["descrizione"]); ?></h3>
                <p class="text-center text-md-start">Total: €<?php echo number_format($totalPrice, 2); ?></p>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                    <button class="btn btn-primary decrease-quantity" data-prod-id="<?php echo $item["codProd"]; ?>" data-max-quantity="<?php echo $maxQuant; ?>">-</button>
                    <span class="mx-2 quantity" data-prod-id="<?php echo $item["codProd"]; ?>"><?php echo htmlspecialchars($item["quantita"]); ?></span>
                    <button class="btn btn-primary increase-quantity" data-prod-id="<?php echo $item["codProd"]; ?>" data-max-quantity="<?php echo $maxQuant ?>">+</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        <div class="cart-summary text-end p-3 bg-light shadow rounded">
            <p><strong>Subtotal: €<?php echo number_format($subtotal, 2); ?></strong></p>
            <button class="btn btn-primary order-button" data-order-id="<?php echo $templateParams["codiceOrdine"]; ?>" data-subtotal="<?php echo number_format($subtotal, 2); ?>">Order</button>
        </div>
    <?php endif; ?>
</div>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalMessage"></p>
        <button id="confirmButton" class="btn btn-primary">Confirm</button>
        <button id="cancelButton" class="btn btn-secondary">Cancel</button>
    </div>
</div>