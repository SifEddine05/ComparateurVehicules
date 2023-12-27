<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class AvisModel{
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }
        public function getBestAvis($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT * FROM `avis` 
            INNER JOIN user on user.UserId=avis.UserId
            WHERE VehiculeId=? and Confirmer=1 
            ORDER By Apprecie DESC
            LIMIT 3") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }

        public function AddAvis($stars ,$comment,$Vid)
        {
            $conn = $this->db->connect();
            $userId = $_COOKIE['user'];
            $query = $conn->prepare("INSERT INTO `avis`( `Note`, `Apprecie`, `UserId`, `Confirmer`, `VehiculeId`, `Commentaire`, `MarqueId`) VALUES (?,0,?,0,?,?,null)") ;
           $query->execute(array($stars,$userId,$Vid,$comment));
           $this->db->disconnect($conn);
           return 1;
        }

}

?>