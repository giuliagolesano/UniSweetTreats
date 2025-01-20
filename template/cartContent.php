<div class="cart">
    <h2>Your Cart</h2>
    <?php if(empty($templateParams["cartItems"])): ?> <!--if the cart has no orders in creation-->
        <h3>Your cart is empty!</h3>
    <?php else: 
        $subtotal = 0;
        foreach($templateParams["cartItems"] as $item): 
            $totalPrice = $item["quantita"] * $item["prezzo"];
            $subtotal += $totalPrice;
    ?>
        <div>
            <img src="<?php echo getImageProduct($item["nomeTip"], $item["foto"]); ?>" alt="<?php echo htmlspecialchars($item["descrizione"]); ?>">
            <div>
                <h3><?php echo htmlspecialchars($item["descrizione"]); ?></h3>
                <p>Totale: €<?php echo number_format($totalPrice, 2); ?></p>
                <div>
                    <button>-</button><!--to do: add the functionality to remove the product from the cart-->
                    <span><?php echo htmlspecialchars($item["quantita"]); ?></span>
                    <button>+</button><!--to do: add the functionality to add more of the same product to the cart-->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        <div>
            <p>Subtotal: €<?php echo number_format($subtotal, 2); ?></p>
            <button>Order</button><!--to do: add the functionality to order the products in the cart-->
        </div>
    <?php endif; ?>
</div>


