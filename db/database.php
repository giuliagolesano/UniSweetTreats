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

    // Function to get 3 random feedbacks
    public function getRandomFeedbacks(){
        $stmt = $this->db->prepare("SELECT * FROM feedback ORDER BY RAND() LIMIT 3");
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
        $stmt = $this->db->prepare("
            SELECT p.nomeTip, p.codProd, MAX(total_quantity) as total_quantity
            FROM (
                SELECT p.nomeTip, p.codProd, SUM(o.quantita) as total_quantity
                FROM prodotto p
                JOIN ordine o ON p.codProd = o.codProd
                GROUP BY p.nomeTip, p.codProd
            ) as subquery
            GROUP BY p.nomeTip
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
        $stmt = $this->db->prepare("SELECT * FROM ORDINE WHERE e_mail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>