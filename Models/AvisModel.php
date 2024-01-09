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

        public function AddAvis($stars ,$comment,$Vid,$Mid)
        {
            $conn = $this->db->connect();
            $userId = $_COOKIE['user'];
            if($Mid ==-1)
            {
                $query = $conn->prepare("INSERT INTO `avis`( `Note`, `Apprecie`, `UserId`, `Confirmer`, `VehiculeId`, `Commentaire`, `MarqueId`) VALUES (?,0,?,0,?,?,null)") ;
                $query->execute(array($stars,$userId,$Vid,$comment));
            }
            else{
                $query = $conn->prepare("INSERT INTO `avis`( `Note`, `Apprecie`, `UserId`, `Confirmer`, `VehiculeId`, `Commentaire`, `MarqueId`) VALUES (?,0,?,0,null,?,?)") ;
                $query->execute(array($stars,$userId,$comment,$Mid));
            }
            
           $this->db->disconnect($conn);
           return 1;
        }

        public function getBestAvisMarque($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT * FROM `avis` 
            INNER JOIN user on user.UserId=avis.UserId
            WHERE MarqueId=? and Confirmer=1 
            ORDER By Apprecie DESC
            LIMIT 3") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }

        public function getNbrAvis($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT COUNT(AvisVehiculeId) as Nbr FROM avis Where avis.VehiculeId=? and avis.Confirmer=1") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }
        public function getAvisByPage($id,$offset,$records_per_page)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT * FROM `avis` 
            INNER JOIN user on user.UserId=avis.UserId
            WHERE VehiculeId=:id and Confirmer=1 
            ORDER By Apprecie DESC
            LIMIT :offset, :records_per_page");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);            
            $this->db->disconnect($conn);
            return $results;
        }
        public function getAllAvisVehcicule()
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT avis.*,user.*,vehicule.VehiculeId , vehicule.Nom as vechNom FROM `avis` 
            INNER JOIN user on user.UserId = avis.UserId
            INNER JOIN vehicule on vehicule.VehiculeId = avis.VehiculeId");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);            
            $this->db->disconnect($conn);
            return $results;
        }

        public function AccepteAvis($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `avis` SET `Confirmer`=1 WHERE AvisVehiculeId=?") ;
           $query->execute(array($id));
           $this->db->disconnect($conn);
           return 1;
        }

}

/*SELECT * FROM `avis` 
            INNER JOIN user on user.UserId=avis.UserId
            WHERE VehiculeId=7 and Confirmer=1 
            ORDER By Apprecie DESC
            LIMIT 0,5*/

?>