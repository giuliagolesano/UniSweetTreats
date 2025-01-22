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
