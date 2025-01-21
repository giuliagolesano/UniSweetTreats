function addProduct() {

}

function filter() {

}

function getPersonalitation() {

}


function updateRangeValue(id) {
    const rangeInput = document.getElementById(id);
    const rangeValue = document.getElementById(id + 'Value');
    if (id === 'prezzoMax' && parseInt(rangeInput.value) < parseInt(document.getElementById('prezzoMin').value)) {
        rangeInput.value = document.getElementById('prezzoMin').value;
    }
    rangeValue.textContent = rangeInput.value;
    if (id === 'prezzoMin') {
        const prezzoMaxInput = document.getElementById('prezzoMax');
        const prezzoMaxValue = document.getElementById('prezzoMaxValue');
        if (parseInt(prezzoMaxInput.value) < parseInt(rangeInput.value)) {
            prezzoMaxValue.textContent = rangeInput.value;
            prezzoMaxInput.value = rangeInput.value;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    updateRangeValue('prezzoMin');
    updateRangeValue('prezzoMax');
});


document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(button => {
        button.addEventListener("click", () => {
            const codProd = button.getAttribute("data-id");
            if (confirm("Sei sicuro di voler eliminare questo prodotto?")) {
                fetch("shop.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `action=deleteProduct&codProd=${codProd}`
                })
                .then(response => response.text())
                .then(data => {
                    if (data === "success") {
                        alert("Prodotto eliminato con successo!");
                        button.closest("div").remove(); // Rimuove il prodotto dalla lista
                    } else {
                        alert("Errore durante l'eliminazione del prodotto.");
                    }
                })
                .catch(error => {
                    console.error("Errore:", error);
                    alert("Errore durante l'eliminazione del prodotto.");
                });
            }
        });
    });
});



