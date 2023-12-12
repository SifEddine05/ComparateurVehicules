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

        public function getVersionByModele($modele)
        {
            $conn = $this->db->connect();

            $query = $conn->prepare("SELECT version
            FROM vehicule
            INNER JOIN caracteristique ON vehicule.CaracteristiqueId = caracteristique.CaracteristiqueId
            WHERE vehicule.ModeleId = ?;");

            $query->execute(array($modele));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->db->disconnect($conn);
            return $results;
        }

        public function getAnneeByVersion($version)
        {
            $conn = $this->db->connect();

            $query = $conn->prepare("SELECT Annees
            FROM `vehicule`
            INNER JOIN caracteristique ON vehicule.CaracteristiqueId = caracteristique.CaracteristiqueId
            WHERE version = ?
            ");

            $query->execute(array($version));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->db->disconnect($conn);
            return $results;
        }

        public function getPopulaireComparations()
        {
            $conn = $this->db->connect();
            $requet = "SELECT tab1.*,v1.Nom as Nom1 ,v2.Nom as Nom2  from 
            (SELECT tab.*,url as url2 FROM
            (SELECT comparison.*,url as url1
            FROM comparison
            INNER JOIN imagevehicule ON imagevehicule.IdVehicule = comparison.VehiculeId1
            INNER JOIN image ON image.ImageId = imagevehicule.IdImage
             ) as tab
             INNER JOIN imagevehicule ON imagevehicule.IdVehicule = tab.VehiculeId2
             INNER JOIN image ON image.ImageId = imagevehicule.IdImage
             )as tab1
             INNER JOIN vehicule as v1 ON v1.VehiculeId = tab1.VehiculeId1 
             INNER JOIN vehicule as v2 ON v2.VehiculeId = tab1.VehiculeId2
            ORDER by NombreDesFoisUtiliser DESC
            LIMIT 3
            " ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        


        // public function getVehiculeByMMVA()
        // {
            
        // }


    }

?>