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

    function getFilteredArticles($articlesList, $categories, $minPrice, $maxPrice, $db) {
        $filteredArticles = [];
    
        foreach ($articlesList as $article) {
            
            $prezzo = $db->getPriceByProduct($article['nomeGusto'], $article['nomeTip']);

            if($prezzo !== null) {
                if(in_array($article['nomeTip'], $categories) &&
                $prezzo >= $minPrice &&
                $prezzo <= $maxPrice ){
                    $filteredArticles[] = $article;
                }
            }
        }
        return $filteredArticles;
    }

?>