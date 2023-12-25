<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class MarqueModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }
        public function getPrincipaleMarques()
        {
            $conn = $this->db->connect();
            $requet = "SELECT marque.MarqueId,marque.Nom,url as logo FROM `marque` INNER JOIN image on marque.ImageId = image.ImageId Order by Principale LIMIT 5";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }
        public function getAllMarques()
        {
            $conn = $this->db->connect();
            $requet = "SELECT MarqueId,Nom FROM `marque` " ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }
        public function getMarqueById($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT marque.* ,image.url as logo FROM `marque` 
            INNER JOIN image On image.ImageId=marque.ImageId
            WHERE MarqueId=?") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }
        

        public function getPrincipaleVehicules($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT vehicule.Nom ,vehicule.VehiculeId , image.url as image  FROM `vehicule` 
            INNER JOIN marque on marque.MarqueId=vehicule.MarqueId
            INNER JOIN imagevehicule ON VehiculeId = imagevehicule.IdVehicule
            INNER JOIN image ON imagevehicule.IdImage = image.ImageId
            Where marque.MarqueId=?
            LIMIT 4 ") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }

        public function getAllVehicules($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT vehicule.Nom ,vehicule.VehiculeId   FROM `vehicule` 
            INNER JOIN marque on marque.MarqueId=vehicule.MarqueId
            Where marque.MarqueId=? ") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }
    }
?>