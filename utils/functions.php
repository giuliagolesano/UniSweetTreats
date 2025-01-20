<?php
    function getImageProduct($category, $image) {
        switch($category) {
            case "cake":
                return CAKES_DIR . $image;
            case "cupcake":
                return CUPCAKES_DIR . $image;
            case "cookie":
                return COOKIES_DIR . $image;
            case "gummy":
                return GUMMIES_DIR . $image;
            default:
                die("Category not found");
        }
    }
?>