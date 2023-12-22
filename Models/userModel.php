<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class UserModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }

        public function NewUser()
        {
            $conn = $this->db->connect();
            
            $query = $conn->prepare("INSERT INTO `user`(`Nom`, `Prenom`, `Sexe`, `DateDeNaissance`, `MotDePasse`, `Status`, `isAdmin`) 
                                     VALUES (:nom, :prenom, :sexe, :dateNaissance, :pwd, :status, 0)");
        
            $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindParam(':sexe', $sexe, PDO::PARAM_STR);
            $query->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
            $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
        
            $nom = "John";
            $prenom = "Doe";
            $sexe = "Male";
            $dateNaissance = "1990-01-01";
            $pwd = "hashed_password";  
            $status = "Active";
        
            $query->execute();
        
            
        
            $this->db->disconnect($conn);
        
            return true; 
        }
        

}

?>