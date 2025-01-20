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

    // Function to add a new admin
    public function signUpAdmin($email, $nome, $cognome, $password){
        $stmt = $this->db->prepare("INSERT INTO ADMIN (e_mail, nome, cognome, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $email, $nome, $cognome, $password);
        return $stmt->execute();
    }

    // Function to login a user
    public function loginUser($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM UTENTE WHERE e_mail = ? AND password = ?");
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Function to login an admin
    public function loginAdmin($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM ADMIN WHERE e_mail = ? AND password = ?");
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Function to get notifications for a specific user email
    public function getNotificationsByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM NOTIFICA WHERE e_mail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get updates for a specific admin email
    public function getUpdatesByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM AGGIORNAMENTO WHERE e_mail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get 3 random reviews
    public function getRandomReviews(){
        $stmt = $this->db->prepare("SELECT * FROM review ORDER BY RAND() LIMIT 3");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Function to get 4 random photos from ARCHIVIO_FOTO
    public function getRandomPhotos(){
        $stmt = $this->db->prepare("SELECT * FROM ARCHIVIO_FOTO ORDER BY RAND() LIMIT 4");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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
            COUNT(*) AS totale_vendite
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

    // Function to get all recipes
    public function getAllRecipes(){
        $stmt = $this->db->prepare("SELECT * FROM RICETTA");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to get all FAQs
    public function getAllFAQs(){
        $stmt = $this->db->prepare("SELECT * FROM FAQ");
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

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT * FROM TIPOLOGIA");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCostsForOrders($email){
        $stmt = $this->db->prepare("SELECT O.codOrd AS CodiceOrdine, SUM(T.prezzo) AS CostoTotale FROM UTENTE U
        INNER JOIN ORDINE O ON U.e_mail = O.e_mail
        INNER JOIN FORMATO_DA F ON O.codOrd = F.codOrd
        INNER JOIN PRODOTTO P ON F.codProd = P.codProd
        INNER JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
        WHERE 
        U.e_mail = ?
        GROUP BY 
        O.codOrd;
        ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $costs = [];
        while ($row = $result->fetch_assoc()) {
            $costs[$row['CodiceOrdine']] = $row['CostoTotale'];
        }
        return $costs;
    }

    public function getProductsForOrders($email){
        $stmt = $this->db->prepare("SELECT 
        O.codOrd AS CodiceOrdine,
        P.codProd AS CodiceProdotto,
        P.descrizione AS DescrizioneProdotto,
        P.nomeGusto AS NomeGusto,
        P.nomeTip AS NomeTip,
        P.foto AS FotoProdotto,
        F.foto AS FotoAggiunta,
        F.testo AS TestoAggiunto,
        F.topping AS ToppingAggiunto,
        COUNT(F.codProd) AS Quantita,
        COUNT(F.codProd) * T.prezzo AS PrezzoTotale
        FROM 
        UTENTE U
        INNER JOIN ORDINE O ON U.e_mail = O.e_mail
        INNER JOIN FORMATO_DA F ON O.codOrd = F.codOrd
        INNER JOIN PRODOTTO P ON F.codProd = P.codProd
        INNER JOIN TARIFFARIO T ON P.nomeGusto = T.nomeGusto AND P.nomeTip = T.nomeTip
        WHERE 
        U.e_mail = ?
        GROUP BY 
        O.codOrd, P.codProd, P.descrizione, P.nomeGusto, P.nomeTip, P.foto, F.foto, F.testo, F.topping, T.prezzo
        ORDER BY 
        O.codOrd, P.codProd;
        ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[$row['CodiceOrdine']][$row['CodiceProdotto']] = $row;
        }
        return $products;
    }

}

?>