document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".notifications").forEach(button => {
        button.addEventListener("click", function() {
            const codNot = this.dataset.codNot;
            fetch("updateNotification.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ codNot: codNot })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    this.textContent = this.textContent === "Read" ? "To Read" : "Read";
                    this.closest("div").querySelector(".stato").textContent = "Stato: " + (this.textContent === "Read" ? "to_read" : "read");
                }
            });
        });
    });
});