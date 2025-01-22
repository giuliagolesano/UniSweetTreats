document.addEventListener("DOMContentLoaded", function() {
    const orderButton = document.querySelector(".order-button");
    orderButton.addEventListener("click", function(event) {
        event.preventDefault();
        const subtotal = orderButton.dataset.subtotal;
        const orderId = orderButton.dataset.orderId;
        const confirmOrder = confirm(`The total price is €${subtotal}. Do you want to place the order?`);
        if (confirmOrder) {
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
                    alert("Order placed successfully!");
                    window.location.href = "cart.php";
                } else {
                    alert("Failed to place the order.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Failed to place the order due to a network error.");
            });
        }
    });
});

