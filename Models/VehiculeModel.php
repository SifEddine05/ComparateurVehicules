<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class VehiculeModel {
        private $db;
        public function __construct()
        {
            $this->db = new DataBaseModel();
        }


        public function getModeleByMarque($marque)
        {
            $conn = $this->db->connect();

            $query = $conn->prepare(" SELECT ModeleId, Name
            FROM (
                SELECT modele.*, vehicule.MarqueId
                FROM modele 
                INNER JOIN vehicule ON vehicule.ModeleId = modele.ModeleId
                WHERE MarqueId = ?
            ) AS tab1
            INNER JOIN marque ON tab1.MarqueID = marque.MarqueId;
            ");

            $query->execute(array($marque));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->db->disconnect($conn);
            return $results;
        }

        // public function getVehiculeByMMVA()
        // {
            
        // }


    }

?>