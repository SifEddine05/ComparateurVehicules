<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class MessageModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }
        public function sendMessage($nom, $email, $msg) {
            $conn = $this->db->connect();
            
            $query = $conn->prepare("INSERT INTO messages (sender, email, message, isreaded) VALUES (:nom, :email, :msg, false)");
        
            $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':msg', $msg, PDO::PARAM_STR);
        
            $query->execute();
        
            
        
            $this->db->disconnect($conn);
            return true; 
        }
}
        
        
?>