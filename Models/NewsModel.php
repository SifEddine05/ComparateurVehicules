<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class NewsModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }

        public function getLatestNews()
        {
            $conn = $this->db->connect();
            $requet = "SELECT news.*,url as image FROM `news` 
            INNER Join imagenews on imagenews.NewsId=news.NewsId
            INNER Join image on image.ImageId=imagenews.ImageId
            ORDER by date_creation DESC
            LIMIT 3";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function getNewsByPage($offset,$records_per_page)
        {
            $conn = $this->db->connect();
            
            $query = $conn->prepare("SELECT news.*, url as image FROM `news` 
            INNER JOIN imagenews ON imagenews.NewsId = news.NewsId
            INNER JOIN image ON image.ImageId = imagenews.ImageId
            ORDER BY date_creation DESC
            LIMIT :offset, :records_per_page");

            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);            
            $this->db->disconnect($conn);
            return $results;
            
        }
        public function getNbrNews()
        {
            $conn = $this->db->connect();
            $requet = "SELECT COUNT(NewsId) as nbr FROM `news`";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }
    
    
    }

?>