<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class UserModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }

        public function NewUser($nom,$prenom,$sexe,$dateNaissance,$email ,$pwd,$status)
        {
            $conn = $this->db->connect();
            
            $query = $conn->prepare("INSERT INTO `user`(`UserId`, `Nom`, `Prenom`, `Sexe`, `DateDeNaissance`, `email`, `MotDePasse`, `Status`, `isAdmin`)
                                     VALUES (:nom, :prenom, :sexe, :dateNaissance,:email, :pwd, 'pending', 0)");
        
            $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindParam(':sexe', $sexe, PDO::PARAM_STR);
            $query->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);
        
            $query->execute();
        
            
        
            $this->db->disconnect($conn);
        
            return true; 
        }
        

}

?>