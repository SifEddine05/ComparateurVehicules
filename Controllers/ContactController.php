<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/ContactModel.php');
    class ContactController {
        private $model ; 
        public function __construct()
        {
            $this->model = new ContactModel();
        }
        public function getContacts()
        {
            $res = $this->model->getContacts() ;
            return $res ;
        }
    }


?>