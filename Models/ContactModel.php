<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 
    //?page=news&id=123

    class ContactModel{
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }
        public function getContacts()
        {
            $conn = $this->db->connect();
            $requet="SELECT id , contact.type,contact.url,contact.Name ,image.url as logo FROM `contact` Inner Join image on contact.logo = image.ImageId";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
            
        }
        public function AddContact($Name,$Type, $url,$imageId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("INSERT INTO `contact`(`type`, `url`, `logo`, `Name`) VALUES (?,?,?,?)") ;
            $query->execute(array($Type ,$url, $imageId,$Name));
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