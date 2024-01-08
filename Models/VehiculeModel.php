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

            $query = $conn->prepare("SELECT Annees , VehiculeId
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

        public function getVehiculeById($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT VehiculeId,vehicule.Nom,vehicule.Prix,marque.Nom as marque ,dimensions.* , modele.Name as modele , moteur.* , caracteristique.* , performances.* ,url as image FROM `vehicule` 
            INNER JOIN marque on marque.MarqueId=vehicule.MarqueId 
            INNER JOIN modele on modele.ModeleId=vehicule.ModeleId
            INNER JOIN moteur on moteur.MoteurId = vehicule.MoteurId
            INNER JOIN caracteristique on caracteristique.CaracteristiqueId = vehicule.CaracteristiqueId
            INNER JOIN performances on performances.PerformancesId = vehicule.PerformancesId
            INNER JOIN dimensions ON dimensions.DimensionsId=vehicule.DimensionId
            INNER JOIN imagevehicule ON imagevehicule.IdVehicule=vehicule.VehiculeId
            INNER JOIN image ON image.ImageId = imagevehicule.IdImage
            WHERE VehiculeId=?
            LIMIT 1") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }
        
        public function getPopulaireComparationsById($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT tab1.*,v1.Nom as Nom1 ,v2.Nom as Nom2  from 
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
             WHERE (tab1.VehiculeId1=? or tab1.VehiculeId2=?)
            ORDER by NombreDesFoisUtiliser DESC
            LIMIT 3") ;
           $query->execute(array($id,$id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }

        public function getAllVehiculesIDs()
        {
            $conn = $this->db->connect();
            $requet = "SELECT VehiculeId,Nom FROM `vehicule` " ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function getAllVehiculeByMarqueId($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT marque.MarqueId ,marque.Nom as marque ,vehicule.VehiculeId, vehicule.Nom , modele.Name as Modele, caracteristique.Version ,caracteristique.Annees FROM `vehicule`
            INNER JOIN marque on marque.MarqueId = vehicule.MarqueId
            INNER JOIN caracteristique on caracteristique.CaracteristiqueId = vehicule.CaracteristiqueId
            INNER JOIN modele on modele.ModeleId = vehicule.ModeleId 
            WHERE marque.MarqueId=?") ;
            $query->execute(array($id));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->db->disconnect($conn);
            return $results;
        }

//--------------------------------------------- Add vehicule --------------------------------------------------------------------------
        public function AddModele($modele){
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `modele`( `Name`) VALUES (?)") ;
            $query->execute(array($modele));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function AddMoteur($nbrcyl,$nbrsoup,$cylin,$puissDin,$Couple,$puissFis){
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `moteur`( `NombreCylindres`, `NombreSoupapesParCylindre`, `Cylindree`, `PuissanceDIN`, `CoupleMoteur`, `PuissanceFiscale`) VALUES (?,?,?,?,?,?)") ;
            $query->execute(array($nbrcyl,$nbrsoup,$cylin,$puissDin,$Couple,$puissFis));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function AddDimensions($largeur,$hauteur,$nbrPlaces,$VolCoffre)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `dimensions`( `Largeur`, `Hauteur`, `NombrePlaces`, `VolumeCoffre`) VALUES (?,?,?,?)") ;
            $query->execute(array($largeur,$hauteur,$nbrPlaces,$VolCoffre));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function AddPerformance($vitesseMax,$Acceleration)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `performances`( `VitesseMaximum`, `Acceleration`) VALUES (?,?)") ;
            $query->execute(array($vitesseMax,$Acceleration));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function AddCaracteristique($Energie,$Consommation,$Version,$Annees,$Boite,$NbVitesse)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `caracteristique`( `Energie`, `Consommation`, `Version`, `Annees`, `Boite`, `NbVitesses`) VALUES (?,?,?,?,?,?)") ;
            $query->execute(array($Energie,$Consommation,$Version,$Annees,$Boite,$NbVitesse));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }


        public function AddVehicule($Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `vehicule`(`Nom`, `MarqueId`, `ModeleId`, `MoteurId`, `DimensionId`, `PerformancesId`, `CaracteristiqueId`, `Prix`, `NbrVisite`) VALUES (?,?,?,?,?,?,?,?,0)") ;
            $query->execute(array($Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function GetLastId()
        {
            $conn = $this->db->connect();
            $requet = "SELECT MAX(vehicule.VehiculeId) AS ID FROM vehicule" ;
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function AddImage($url)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `image`( `url`) VALUES (?)") ;
           $query->execute(array($url));
           $lastInsertId = $conn->lastInsertId();
           $this->db->disconnect($conn);
           return $lastInsertId;
        }

    
        public function AddVehiculeImage($imageId,$VehiculeId) 
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `imagevehicule`( `IdImage`, `IdVehicule`) VALUES (?,?)") ;
            $query->execute(array($imageId,$VehiculeId));
            $this->db->disconnect($conn);
            return 1;
        }


    }

?>