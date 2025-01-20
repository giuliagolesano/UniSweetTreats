document.addEventListener("DOMContentLoaded", function() {
    var menuIcon = document.querySelector(".menu-icon");
    var closeBtn = document.querySelector(".closebtn");
    var sidenav = document.getElementById("mySidenav");

    function openNav() {
        sidenav.style.width = "250px";
    }

    function closeNav() {
        sidenav.style.width = "0";
    }

    menuIcon.addEventListener("click", openNav);
    menuIcon.addEventListener("keydown", function(event) {
        if (event.key === "Enter" || event.key === " ") {
            openNav();
        }
    });

    closeBtn.addEventListener("click", closeNav);
    closeBtn.addEventListener("keydown", function(event) {
        if (event.key === "Enter" || event.key === " ") {
            closeNav();
        }
    });
});