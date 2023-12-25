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
        $requet = "SELECT diaporama.DiaporamaId, diaporama.UrlPublicite AS url, diaporama.Type, image.url AS image 
        FROM diaporama 
        INNER JOIN image ON image.ImageId = diaporama.IdImage 
        WHERE diaporama.UrlPublicite IS NOT NULL
        UNION
        SELECT diaporama.DiaporamaId, CONCAT('newsdetails?id=', diaporama.IdNews) AS url, diaporama.Type, image.url AS image 
        FROM diaporama 
        INNER JOIN image ON image.ImageId = diaporama.IdImage 
        WHERE diaporama.UrlPublicite IS NULL;";
        $result = $this->db->requete($conn,$requet);
        $this->db->disconnect($conn);
        return $result;
    }
}

?>