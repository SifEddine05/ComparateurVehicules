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
        public function getAllMarquesInformations()
        {
            $conn = $this->db->connect();
            $requet = "SELECT * FROM `marque` " ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function GetLastId()
        {
            $conn = $this->db->connect();
            $requet = "SELECT MAX(marque.MarqueId) AS ID FROM marque" ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }
        public function AddMarqueLogo($url)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `image`( `url`) VALUES (?)") ;
           $query->execute(array($url));
           $lastInsertId = $conn->lastInsertId();

           $this->db->disconnect($conn);
           return $lastInsertId;
        }
        public function AddMarque($Nom,$ImageId,$PaysOrigine,$SiegeSociale,$AnneeCreation,$Principale)
        { 
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `marque`(`Nom`, `ImageId`, `PaysOrigine`, `SiegeSociale`, `AnneeCreation`, `Principale`) VALUES (?,?,?,?,?,?)") ;
            $query->execute(array($Nom,$ImageId,$PaysOrigine,$SiegeSociale,$AnneeCreation,$Principale));
            $this->db->disconnect($conn);
            return 1;
        }
        public function DeleteMarque($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("DELETE FROM `marque` WHERE MarqueId=?") ;
            $query->execute(array($id));
            $this->db->disconnect($conn);
            return 1;
        }
        public function EditMarque($id,$Nom,$ImageId,$PaysOrigine,$SiegeSociale,$AnneeCreation,$Principale)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `marque` SET `Nom`=?,`ImageId`=? ,`PaysOrigine`=? ,`SiegeSociale`=? ,`AnneeCreation`=?,`Principale`=? WHERE MarqueId=?") ;
            $query->execute(array($Nom,$ImageId,$PaysOrigine,$SiegeSociale,$AnneeCreation,$Principale,$id));
            $this->db->disconnect($conn);
            return 1;
        }

        
    }
?>