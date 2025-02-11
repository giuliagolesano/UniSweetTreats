<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    // Function to sign up a new user
    public function signUpUser($email, $nome, $cognome, $password, $consensoNews){
        $stmt = $this->db->prepare("INSERT INTO UTENTE (e_mail, nome, cognome, password, consensoNews) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $email, $nome, $cognome, $password, $consensoNews);
        return $stmt->execute();
    }

    //Function to login an user
    public function checkLoginUser($email){
        $query = "SELECT e_mail, nome, cognome, password, consensoNews  FROM utente WHERE e_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    //Function to login an admin
    public function checkLoginAdmin($email, $password){
        $query = "SELECT e_mail, nome, cognome, `password`  FROM `admin` WHERE e_mail = ? AND `password` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } 

    // Function to get notifications for a specific user email
    public function getNotificationsByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM NOTIFICA WHERE e_mail = ? ORDER BY giorno DESC, ora DESC");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get updates for a specific admin email
    public function getUpdatesByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM AGGIORNAMENTO WHERE e_mail = ? ORDER BY giorno DESC, ora DESC");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to check if a email is present
    public function isEmailRegistered($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM UTENTE WHERE e_mail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }
    
    // Function to update the state of the consent
    public function updateNewsletterConsent($email) {
        $stmt = $this->db->prepare("UPDATE UTENTE SET consensoNews = 'S' WHERE e_mail = ?");
        $stmt->bind_param('s', $email);
        return $stmt->execute();
    }

    // Function to get the best seller for each product type
    public function getBestSellers(){
        $stmt = $this->db->prepare("WITH TotaliProdotti AS (
            SELECT 
                P.nomeTip,
                P.codProd,
                P.descrizione,
                P.foto,
                G.nomeGusto,
                SUM(F.quantita) AS totale_vendite
            FROM 
                PRODOTTO P
            JOIN 
                formato_da F ON P.codProd = F.codProd
            JOIN 
                GUSTO G ON P.nomeGusto = G.nomeGusto
            GROUP BY 
                P.nomeTip, P.codProd, P.descrizione, P.foto, G.nomeGusto
        ),
        ClassificaTipologia AS (
            SELECT 
                T.nomeTip,
                T.codProd,
                T.descrizione,
                T.foto,
                T.nomeGusto,
                T.totale_vendite,
                ROW_NUMBER() OVER (PARTITION BY T.nomeTip ORDER BY T.totale_vendite DESC) AS posizione
            FROM 
                TotaliProdotti T
        )
        SELECT 
            C.nomeTip,
            C.codProd,
            C.descrizione,
            C.nomeGusto,
            C.foto,
            C.totale_vendite
        FROM 
            ClassificaTipologia C
        WHERE 
            C.posizione = 1;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get all orders for a specific user email
    public function getOrdersByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM ORDINE WHERE e_mail = ? ORDER BY giorno DESC, ora DESC");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get all products
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODOTTO");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get all the producs cheaper than a price
    public function getProductsUnderPrice($filterPrice) {
        $stmt = $this->db->prepare("SELECT p.codProd, p.descrizione, p.foto, t.prezzo, p.nomeGusto, p.nomeTip
                                        FROM PRODOTTO p
                                        JOIN TARIFFARIO t ON p.nomeTip = t.nomeTip AND p.nomeGusto = t.nomeGusto
                                        WHERE t.prezzo <= ? ");
        $stmt->bind_param('d', $filterPrice);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);       
    }

    // Function to get the price of a pruduct
    public function getPriceByProduct($nomeGusto, $nomeTip) {
        $stmt = $this->db->prepare("SELECT prezzo
                                        FROM TARIFFARIO
                                        WHERE nomeGusto = ? AND nomeTip = ?;");
        $stmt->bind_param('ss', $nomeGusto, $nomeTip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row ? $row['prezzo'] : null;
    }

    // Function to get all categories
    public function getCategories() {
        $stmt = $this->db->prepare("SELECT * FROM TIPOLOGIA");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get the total price of an order
    public function getOrderPrice($codOrd) {
        $stmt = $this->db->prepare("SELECT SUM(T.prezzo * F.quantita) AS prezzoOrdineTot FROM ORDINE O
                                    JOIN FORMATO_DA F ON O.codOrd = F.codOrd
                                    JOIN PRODOTTO P ON F.codProd = P.codProd
                                    JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
                                    WHERE O.codOrd = ?");
        $stmt->bind_param('s', $codOrd);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $row = $result->fetch_assoc(); 
        return $row['prezzoOrdineTot'];  
    }

    // Function to get all the products of an order
    public function getProductsByOrder($codOrd) {
        $stmt = $this->db->prepare("SELECT P.codProd, P.descrizione, P.foto, T.prezzo, P.nomeGusto, P.nomeTip, F.foto AS fotoAggiunta, F.testo, F.topping, F.quantita, (F.quantita * T.prezzo) AS prezzoProdottoTot
                                    FROM PRODOTTO P JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
                                    JOIN FORMATO_DA F ON P.codProd = F.codProd
                                    WHERE F.codOrd = ?");
        $stmt->bind_param('s', $codOrd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get the product by code
    public function getProductByCode($codProd) {
        $stmt = $this->db->prepare("SELECT P.*, T.prezzo
                                    FROM PRODOTTO P JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
                                    WHERE P.codProd = ?");
        $stmt->bind_param('s', $codProd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Function to get the orders of a user in waiting state
    public function getOrderCart($email) {
        $stmt = $this->db->prepare("SELECT * FROM ORDINE WHERE stato = 'waiting' AND e_mail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to create an order for a user
    public function createOrder($email) {
        $result = $this->db->query("SELECT MAX(CAST(SUBSTRING(codOrd, 4) AS UNSIGNED)) AS maxCodOrd FROM ORDINE");
        $row = $result->fetch_assoc();
        if ($row['maxCodOrd'] == null) {
            $newCodOrd = 'ord1';
        }
        $newCodOrd = 'ord' . ($row['maxCodOrd'] + 1);
        $stmt = $this->db->prepare("INSERT INTO ORDINE (codOrd, giorno, ora, stato, e_mail) 
                        VALUES (?, CURDATE(), CURTIME(), 'waiting', ?)");
        $stmt->bind_param('ss', $newCodOrd, $email);
        $stmt->execute();
        return $newCodOrd;
    }

    // Function to add a product to the cart
    public function addProductToCart($codOrd, $codProd, $quantita, $customText, $photoName, $topping) {
        $stmt = $this->db->prepare("INSERT INTO FORMATO_DA (codOrd, codProd, foto, testo, topping, quantita) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $codOrd, $codProd, $photoName, $customText, $topping, $quantita);
        $stmt->execute();
    }

    // Function to get the cart items
    public function getCartItems($codOrd) {
        $stmt = $this->db->prepare("SELECT P.codProd, P.descrizione, P.foto, T.prezzo, P.nomeGusto, P.nomeTip, F.foto AS fotoAggiunta, F.testo, F.topping, F.quantita
                                    FROM PRODOTTO P JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
                                    JOIN FORMATO_DA F ON P.codProd = F.codProd
                                    WHERE F.codOrd = ?
                                    GROUP BY P.codProd, P.descrizione, P.foto, T.prezzo, P.nomeGusto, P.nomeTip, F.foto, F.testo, F.topping");
        $stmt->bind_param('s', $codOrd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }   

    // Functtion to get all the orders
    public function getAllOrders(){
        $stmt = $this->db->prepare("SELECT * FROM ORDINE ORDER BY giorno DESC, ora DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get the 3 best reviews of a product
    public function getReviewsByProduct($codProd) {
        $stmt = $this->db->prepare( "SELECT e_mail, testo, valutazione
                      FROM review
                      WHERE codProd = ?
                      ORDER BY valutazione DESC
                      LIMIT 3");
        
        $stmt -> bind_param('s',$codProd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to add a new review for a prduct by a user
    public function insertReview($email, $codProd, $testo, $valutazione) {
        $stmt = $this->db->prepare("INSERT INTO review (e_mail, codProd, testo, valutazione) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $email, $codProd, $testo, $valutazione);
        return $stmt->execute();
    }

    // Function to change the state of a notification
    public function toggleNotificationState($codNot) {
        $stmt = $this->db->prepare("UPDATE NOTIFICA SET stato = CASE WHEN stato = 'read' THEN 'to_read' ELSE 'read' END WHERE codNot = ?");
        $stmt->bind_param('s', $codNot);
        return $stmt->execute();
    }

    // Function to change the state of an update
    public function toggleUpdateState($codNot) {
        $stmt = $this->db->prepare("UPDATE AGGIORNAMENTO SET stato = CASE WHEN stato = 'read' THEN 'to_read' ELSE 'read' END WHERE codNot = ?");
        $stmt->bind_param('s', $codNot);
        return $stmt->execute();
    }

    // Function to place an order (it updates the order state to "placed" and the quantity of the products)
    public function placeOrder($orderId) {
        $this->db->begin_transaction();
    
        try {
            $stmt = $this->db->prepare("UPDATE ORDINE SET stato = 'placed' WHERE codOrd = ?");
            $stmt->bind_param('s', $orderId);
            $stmt->execute();
            $stmt = $this->db->prepare("SELECT codProd, quantita FROM formato_da WHERE codOrd = ?");
            $stmt->bind_param('s', $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($products as $product) {
                $stmt = $this->db->prepare("UPDATE PRODOTTO SET quantita = quantita - ? WHERE codProd = ?");
                $stmt->bind_param('is', $product['quantita'], $product['codProd']);
                $stmt->execute();
            }
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }

    // Function to check if a product is already reviewed by a user
    public function isAlreadyReviewed($email, $codProd) {
        $stmt = $this->db->prepare("SELECT * FROM review WHERE e_mail = ? AND codProd = ?");
        $stmt->bind_param('ss', $email, $codProd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // Function to get the quantity of a product
    public function getMaxQuantity($prodId) {
        $stmt = $this->db->prepare("SELECT quantita FROM PRODOTTO WHERE codProd = ?");
        $stmt->bind_param('s', $prodId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['quantita'];
    }

    // Function to update the quantity of a product in the cart
    public function updateCartQuantity($orderId, $prodId, $quantity) {
        $stmt = $this->db->prepare("UPDATE formato_da SET quantita = ? WHERE codOrd = ? AND codProd = ?");
        $stmt->bind_param('iss', $quantity, $orderId, $prodId);
        return $stmt->execute();
    }

    // Function to remove a product from the cart
    public function removeProductFromCart($codOrd, $prodId) {
        $stmt = $this->db->prepare("DELETE FROM FORMATO_DA WHERE codOrd = ? AND codProd = ?");
        $stmt->bind_param('ss', $codOrd, $prodId);
        return $stmt->execute();
    }
    
    // Function to increase the quantity of a product in the cart by a specific quantity
    public function increaseOfQuantityCartProduct($codOrd, $codProd, $quantityToAdd) {
        $stmt = $this->db->prepare("UPDATE FORMATO_DA SET quantita = quantita + ? WHERE codOrd = ? AND codProd = ?");
        $stmt->bind_param('iss', $quantityToAdd, $codOrd, $codProd);
        return $stmt->execute();
    }

    // Function to check if a product is already in the cart
    public function isProductInCart($codOrd, $codProd) {
        $stmt = $this->db->prepare("SELECT * FROM FORMATO_DA WHERE codOrd = ? AND codProd = ? ");
        $stmt->bind_param('ss', $codOrd, $codProd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    //Quando elimino un prodotto devo anche eliminare la sua riga corrispondente in tariffario identificata da nomeTip e nomeGusto del prodotto
    // Function to delete a product from the db
    public function deleteProduct($codProd) {
        $this->db->begin_transaction();
        try {
            // Get the product details to delete from TARIFFARIO
            $stmt = $this->db->prepare("SELECT nomeTip, nomeGusto FROM PRODOTTO WHERE codProd = ?");
            $stmt->bind_param('s', $codProd);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();

            $stmt = $this->db->prepare("DELETE FROM formato_da WHERE codProd = ?");
            $stmt->bind_param('s', $codProd);
            $stmt->execute();

            $stmt = $this->db->prepare("DELETE FROM PRODOTTO WHERE codProd = ?");
            $stmt->bind_param('s', $codProd);
            $stmt->execute();

            $stmt = $this->db->prepare("DELETE FROM TARIFFARIO WHERE nomeTip = ? AND nomeGusto = ?");
            $stmt->bind_param('ss', $product['nomeTip'], $product['nomeGusto']);
            $stmt->execute();

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    // Function to update a product in the db    
    public function updateProductFields($codProd, $name, $description, $price, $photo, $nomeGusto, $nomeTip) {
        $stmt = $this->db->prepare("UPDATE PRODOTTO SET nomeGusto = ?, descrizione = ?, foto = ?, nomeTip = ? WHERE codProd = ?");
        $stmt->bind_param('sssss', $nomeGusto, $description, $photo, $nomeTip, $codProd);
        $stmt->execute();
    
        $stmt = $this->db->prepare("UPDATE TARIFFARIO SET prezzo = ? WHERE nomeGusto = ? AND nomeTip = ?");
        $stmt->bind_param('dss', $price, $nomeGusto, $nomeTip);
        return $stmt->execute();
    }
       
    // Function to get the next notification code
    public function getNextNotificationCode() {
        $result = $this->db->query("SELECT MAX(CAST(SUBSTRING(codNot, 4) AS UNSIGNED)) AS maxCodNot FROM NOTIFICA");
        $row = $result->fetch_assoc();
        if ($row['maxCodNot'] == null) {
            return 'not1';
        }
        return 'not' . ($row['maxCodNot'] + 1);
    }

    // Function to get the next update code
    public function getNextUpdateCode() {
        $result = $this->db->query("SELECT MAX(CAST(SUBSTRING(codNot, 4) AS UNSIGNED)) AS maxCodAgg FROM AGGIORNAMENTO");
        $row = $result->fetch_assoc();
        if ($row['maxCodAgg'] == null) {
            return 'not1';
        }
        return 'not' . ($row['maxCodAgg'] + 1);
    }

    // Function to get all admin emails
    public function getAllAdminEmails() {
        $stmt = $this->db->prepare("SELECT e_mail FROM `admin`");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Function to create a notification
    public function createNotification($codNot, $testo, $stato, $giorno, $ora, $email, $codOrd) {
        $stmt = $this->db->prepare("INSERT INTO NOTIFICA (codNot, testo, stato, giorno, ora, e_mail, codOrd) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $codNot, $testo, $stato, $giorno, $ora, $email, $codOrd);
        return $stmt->execute();
    }

    // Function to create an update for the admin
    public function createUpdateAdmin($codAgg, $testo, $stato, $giorno, $ora, $email) {
        $stmt = $this->db->prepare("INSERT INTO AGGIORNAMENTO (codNot, testo, stato, giorno, ora, e_mail) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $codAgg, $testo, $stato, $giorno, $ora, $email);
        return $stmt->execute();
    }

    // Function to get each product with a quantity of 0
    public function getProductsWithZeroQuantity() {
        $stmt = $this->db->prepare("SELECT codProd FROM PRODOTTO WHERE quantita = 0");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get the new codProd for the new product insert by the admin
    public function getNextProductCode($nomeTip) {
        $stmt = $this->db->prepare("SELECT MAX(CAST(SUBSTRING(codProd, LENGTH(?) + 1) AS UNSIGNED)) AS maxCodProd FROM PRODOTTO WHERE codProd LIKE CONCAT(?, '%')");
        $stmt->bind_param('ss', $nomeTip, $nomeTip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row['maxCodProd'] == null) {
            return $nomeTip . '1';
        }
        return $nomeTip . ($row['maxCodProd'] + 1);
    }

    // Function to check if a product insert alreary exists
    public function productExists($nomeGusto, $nomeTip) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM PRODOTTO WHERE nomeGusto = ? AND nomeTip = ?");
        $stmt->bind_param('ss', $nomeGusto, $nomeTip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Function to add a new product in the db
    public function addProduct($codProd, $name, $description, $price, $photo, $nomeGusto, $nomeTip) {
        if ($this->productExists($nomeGusto, $nomeTip)) {
            throw new Exception("Product with Taste '$nomeGusto' and type '$nomeTip' already exists.");
        }

        $stmt = $this->db->prepare("INSERT INTO PRODOTTO (codProd, nomeGusto, descrizione, foto, nomeTip, quantita) VALUES (?, ?, ?, ?, ?, 50)");
        $stmt->bind_param('sssss', $codProd, $nomeGusto, $description, $photo, $nomeTip);
        $stmt->execute();
        
        $stmt = $this->db->prepare("INSERT INTO TARIFFARIO (nomeGusto, nomeTip, prezzo) VALUES (?, ?, ?)");
        $stmt->bind_param('ssd', $nomeGusto, $nomeTip, $price);
        return $stmt->execute();
    }

    // Function to add a new taste
    public function addTasteIfNotExists($nomeGusto) {
        if (!$this->tasteExists($nomeGusto)) {
            $stmt = $this->db->prepare("INSERT INTO GUSTO (nomeGusto) VALUES (?)");
            $stmt->bind_param('s', $nomeGusto);
            $stmt->execute();
        }
    }

    // Function to check if the taste exists
    public function tasteExists($nomeGusto) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM GUSTO WHERE nomeGusto = ?");
        $stmt->bind_param('s', $nomeGusto);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

}

?>