<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

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

        public function getContactById($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT contact.* , image.ImageId , image.url as image FROM `contact` 
            INNER JOIN image on image.ImageId = contact.logo
            WHERE contact.id=?") ;
            $query->execute(array($id));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->db->disconnect($conn);
            return $results;
        }

        public function EditContact($Name,$Type, $url,$imageId,$contactId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `contact` SET `type`=?,`url`=?,`logo`=?,`Name`=? WHERE contact.id=?") ;
            $query->execute(array($Type ,$url, $imageId,$Name,$contactId));
            $lastInsertedId = $conn->lastInsertId();
            $this->db->disconnect($conn);
            return $lastInsertedId;
        }

        public function DeleteContact($contactId)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("DELETE FROM `contact` WHERE contact.id=?") ;
            $query->execute(array($contactId));
            $this->db->disconnect($conn);
            return 1;
        }
    }

?>