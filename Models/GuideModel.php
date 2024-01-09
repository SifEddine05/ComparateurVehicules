<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class GuideModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }

        
        public function getGuidesByPage($offset,$records_per_page)
        {
            $conn = $this->db->connect();
            
            $query = $conn->prepare("SELECT DISTINCT guideachat.*, url as image FROM `guideachat` 
            INNER JOIN image ON image.ImageId = guideachat.ImageId
            LIMIT :offset,:records_per_page");

            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);            
            $this->db->disconnect($conn);
            return $results;
            
        }
        public function getNbrGuides()
        {
            $conn = $this->db->connect();
            $requet = "SELECT COUNT(GuideAchatId) as nbr FROM `guideachat`";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }
        public function getGuideById($id){
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT  guideachat.*, url as image FROM `guideachat` 
            INNER JOIN image ON image.ImageId = guideachat.ImageId
            Where guideachat.GuideAchatId=?") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }
        
        public function getAllGuide()
        {
            $conn = $this->db->connect();
            $requet = "SELECT * FROM `guideachat`";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function AddGuide($titre,$imageId, $description,$text)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `guideachat`( `Titre`, `ImageId`, `Description`, `Text`) VALUES (?,?,?,?)") ;
            $query->execute(array($titre ,$imageId, $description,$text));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
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
    }

?>