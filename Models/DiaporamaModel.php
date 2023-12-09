<?php
    require_once('DataBase.php') ; 
class DiaporamaModel{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseModel();
    }
    public function getDiaporama()
    {
        $conn = $this->db->connect();
        $requet = "SELECT DiaporamaId, UrlPublicite as url ,Type FROM `diaporama` WHERE UrlPublicite IS NOT NULL
        UNION
        SELECT DiaporamaId, CONCAT('newsDetails?id=', diaporama.IdNews) as url ,Type FROM `diaporama` WHERE UrlPublicite IS  NULL;";
        $result = $this->db->requete($conn,$requet);
        $this->db->disconnect($conn);
        return $result;
    }
}

?>