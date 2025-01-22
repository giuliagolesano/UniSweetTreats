/*cart = [];

function createOrder() {

}

/*
* Function to return the number of products selected in the cart

function numProducts(seleceted) {
    if (isNaN(parseInt(seleceted))) return 0;
    return parseInt(seleceted);
}

/*
* Function to calculate the total price of the products in the cart

function price(seleceted) {
    let total = 0;
    for (let i = 0; i < seleceted.length; i++) {
        total += parseFloat(seleceted[i]["price"]) * seleceted[i]["quantity"];
    }
    return total;
}*/
/*
console.log("cart.js loaded"); // Debugging statement
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".order-button").forEach(button => {
        button.addEventListener("click", function() {
            const codProd = this.dataset.codProd;
            const quantity = this.closest("div").querySelector(".quantity").value;
            fetch("cart.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `action=addProduct&codProd=${codProd}&quantity=${quantity}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert("Prodotto aggiunto al carrello!");
                }
            });
        });
    }
});*/
document.addEventListener("DOMContentLoaded", function() {
    console.log("cart.js loaded"); // Debugging statement
    const orderButton = document.querySelector(".order-button");

    if (orderButton) {
        console.log("Order button found"); // Debugging statement
        orderButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission
            const subtotal = orderButton.dataset.subtotal;
            const orderId = orderButton.dataset.orderId;
            console.log("Order ID:", orderId); // Debugging statement
            console.log("Subtotal:", subtotal); // Debugging statement
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
                        location.reload();
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
    } else {
        console.log("Order button not found"); // Debugging statement
    }
});

