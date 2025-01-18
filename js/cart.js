cart = [];

function createOrder() {

}

/*
* Function to return the number of products selected in the cart
*/
function numProducts(seleceted) {
    if (isNaN(parseInt(seleceted))) return 0;
    return parseInt(seleceted);
}

/*
* Function to calculate the total price of the products in the cart
*/
function price(seleceted) {
    let total = 0;
    for (let i = 0; i < seleceted.length; i++) {
        total += parseFloat(seleceted[i]["price"]) * seleceted[i]["quantity"];
    }
    return total;
}
