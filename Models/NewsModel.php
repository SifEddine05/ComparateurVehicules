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
            
            $query = $conn->prepare("SELECT DISTINCT news.*, url as image FROM `news` 
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
        public function getNewsById($id){
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT  news.*, url as image , image.ImageId  FROM `news` 
            INNER JOIN imagenews ON imagenews.NewsId = news.NewsId
            INNER JOIN image ON image.ImageId = imagenews.ImageId
            Where news.NewsId=?") ;
           $query->execute(array($id));
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           $this->db->disconnect($conn);
           return $results;
        }

        public function getAllNews()
        {
            $conn = $this->db->connect();
            $requet = "SELECT * FROM `news`";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }

        public function AddNews($titre , $description,$text)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `news`( `titre`, `description`, `Text`) VALUES (?,?,?)") ;
           $query->execute(array($titre , $description,$text));
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

        public function AddImageNews($imageId,$NewsId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `imagenews`( `ImageId`, `NewsId`) VALUES (?,?)") ;
            $query->execute(array($imageId,$NewsId));
            $this->db->disconnect($conn);
            return 1;
        }
        public function DeleteNews($newsId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("
            DELETE FROM `diaporama` WHERE IdNews=?;
            DELETE FROM `imagenews` WHERE NewsId=?;
            DELETE FROM `news` WHERE NewsId=?;
            ") ;
            $query->execute(array($newsId,$newsId,$newsId));
            $this->db->disconnect($conn);
            return 1;
        }
        public function EditImageNews($imageId,$NewsId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `imagenews` SET `ImageId` = ? WHERE `NewsId` = ?");
            $query->execute(array($imageId,$NewsId));
            $this->db->disconnect($conn);
            return 1; 
        }
        public function EditNews($titre , $description,$text ,$newsId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `news` SET `titre`=?,`description`=? ,`Text`=? WHERE NewsId=?");
            $query->execute(array($titre , $description,$text ,$newsId));
            $this->db->disconnect($conn);
            return 1; 
        }
    
}

?>