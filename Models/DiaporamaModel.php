<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 
    class DiaporamaModel{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseModel();
    }
    public function getDiaporama()
    {
        $conn = $this->db->connect();
        $root = $_SERVER['DOCUMENT_ROOT'] ;
        $requet = "SELECT diaporama.DiaporamaId, diaporama.UrlPublicite AS url, diaporama.Type, image.url AS image 
        FROM diaporama 
        INNER JOIN image ON image.ImageId = diaporama.IdImage 
        WHERE diaporama.UrlPublicite IS NOT NULL
        UNION
        SELECT diaporama.DiaporamaId, CONCAT('/ComparateurVehicules/newsdetails?id=', diaporama.IdNews) AS url, diaporama.Type, image.url AS image 
        FROM diaporama 
        INNER JOIN image ON image.ImageId = diaporama.IdImage 
        WHERE diaporama.UrlPublicite IS NULL;";
        $result = $this->db->requete($conn,$requet);
        $this->db->disconnect($conn);
        return $result;
    }

    public function AddDiapo($imageId, $url,$Type)
    {
        $conn = $this->db->connect();
        $query = $conn->prepare("INSERT INTO `diaporama`(`IdImage`, `UrlPublicite`, `Type`) VALUES (?,?,?)") ;
        $query->execute(array($imageId, $url,$Type));
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

    public function getDiapoById($id)
    {
        $conn = $this->db->connect();
        $query = $conn->prepare("SELECT diaporama.* , image.ImageId , image.url as image FROM `diaporama` 
        INNER JOIN image on image.ImageId = diaporama.IdImage
        WHERE diaporama.DiaporamaId=?") ;
        $query->execute(array($id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->db->disconnect($conn);
        return $results;
    }

    public function EditDiapo($imageId, $url,$Type,$diapoId)
    {
        $conn = $this->db->connect();
        $query = $conn->prepare("UPDATE `diaporama` SET `IdImage`='[value-3]',`UrlPublicite`='[value-4]',`Type`='[value-5]' WHERE DiaporamaId=?") ;
        $query->execute(array($Type ,$url, $imageId,$Name,$diapoId));
        $lastInsertedId = $conn->lastInsertId();
        $this->db->disconnect($conn);
        return $lastInsertedId;
    }

    public function DeleteDiapo($diapoId)
    {
        $conn = $this->db->connect();
        $query = $conn->prepare("DELETE FROM `diaporama` WHERE DiaporamaId=?") ;
        $query->execute(array($diapoId));
        $this->db->disconnect($conn);
        return 1;
    }
}

?>