document.addEventListener("DOMContentLoaded", function() {
    const orderButton = document.querySelector(".order-button");
    const modal = document.getElementById("confirmationModal");
    const modalMessage = document.getElementById("modalMessage");
    const confirmButton = document.getElementById("confirmButton");
    const cancelButton = document.getElementById("cancelButton");
    const closeButton = document.querySelector(".close");

    orderButton.addEventListener("click", function(event) {
        event.preventDefault();
        const subtotal = orderButton.dataset.subtotal;
        const orderId = orderButton.dataset.orderId;

        modalMessage.textContent = `The total price is €${subtotal}. Do you want to place the order?`;
        modal.style.display = "block";

        confirmButton.onclick = function() {
            modal.style.display = "none";
            fetch("checkout.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ orderId: orderId })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    showModalMessage("Order placed successfully!", true);
                } else {
                    showModalMessage("Failed to place the order.", false);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                showModalMessage("Failed to place the order due to a network error.", false);
            });
        };

        cancelButton.onclick = function() {
            modal.style.display = "none";
        };

        closeButton.onclick = function() {
            modal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    });

    function showModalMessage(message, success) {
        modalMessage.textContent = message;
        confirmButton.style.display = "none";
        cancelButton.textContent = "Close";
        if (success) {
            cancelButton.onclick = function() {
                window.location.href = "cart.php";
            };
            closeButton.onclick = function() {
                window.location.href = "cart.php";
            };
        } else {
            cancelButton.onclick = function() {
                modal.style.display = "none";
            };
        }
        modal.style.display = "block";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const cartMessage = document.getElementById("cart-message");

    function showCartMessage(message, type) {
        cartMessage.textContent = message;
        cartMessage.classList.remove("d-none");
        setTimeout(() => {
            cartMessage.classList.add("d-none");
        }, 3000);
    }

    function updateCartQuantity(prodId, quantity) {
        fetch("updateCart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ prodId: prodId, quantity: quantity }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (!data.success) {
                    showCartMessage("Failed to update the cart.", "danger");
                } else {
                    location.reload();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                showCartMessage("Failed to update the cart due to a network error.", "danger");
            });
    }

    function removeProductFromCart(prodId) {
        fetch("removeFromCart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ prodId: prodId }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (!data.success) {
                    showCartMessage("Failed to remove the product.", "danger");
                } else {
                    location.reload();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                showCartMessage("Failed to remove the product due to a network error.", "danger");
            });
    }

    document.querySelectorAll(".decrease-quantity").forEach((button) => {
        button.addEventListener("click", function () {
            const prodId = this.dataset.prodId;
            const quantitySpan = document.querySelector(`.quantity[data-prod-id='${prodId}']`);
            let quantity = parseInt(quantitySpan.textContent);

            if (quantity > 1) {
                quantity--;
                quantitySpan.textContent = quantity;
                updateCartQuantity(prodId, quantity);
            } else {
                showCartMessage("Quantity cannot be less than 1.", "warning");
            }
        });
    });

    document.querySelectorAll(".increase-quantity").forEach((button) => {
        button.addEventListener("click", function () {
            const prodId = this.dataset.prodId;
            const maxQuantity = parseInt(this.dataset.maxQuantity);
            const quantitySpan = document.querySelector(`.quantity[data-prod-id='${prodId}']`);
            let quantity = parseInt(quantitySpan.textContent);

            if (quantity < maxQuantity) {
                quantity++;
                quantitySpan.textContent = quantity;
                updateCartQuantity(prodId, quantity);
            } else {
                showCartMessage("Maximum quantity reached.", "warning");
            }
        });
    });

    document.querySelectorAll(".remove-product").forEach((button) => {
        button.addEventListener("click", function () {
            const prodId = this.dataset.prodId;
            removeProductFromCart(prodId);
        });
    });
});
