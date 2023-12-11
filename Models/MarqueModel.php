<?php
    require_once('DataBase.php') ; 

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
    }
?>