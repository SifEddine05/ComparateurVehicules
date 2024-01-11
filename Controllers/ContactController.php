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
        
        public function AddContact($Name,$Type, $url,$imageId)
        {
            $res = $this->model->AddContact($Name,$Type, $url,$imageId) ;
            return $res ;
        }
        public function AddImage($url)
        {
            $res = $this->model->AddImage($url) ;
            return $res ;
        }
    }


?>