<?php
    function getImageProduct($category, $type) {
        switch($category) {
            case "cake":
                return "resources/cakes" . "/" . $type . "Cake.png";
            case "cupcake":
                return "resources/cupcakes" . "/" . $type . "Cupcake.png";
            case "cookie":
                return "resources/cookies" . "/" . $type . "Cookie.png";
            case "gummy":
                return "resources/gummies" . "/" . $type . "Gummy.png";
            default:
                die("Category not found");
        }
    }
?>