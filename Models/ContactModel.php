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
            $requet="SELECT contact.type,contact.url,image.url as logo FROM `contact` Inner Join image on contact.logo = image.ImageId";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
            
        }
    }

?>