<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/MarqueModel.php');

    class MarqueController
    {
        private $marque ; 
        public function __construct()
        {
                $this->marque = new MarqueModel();
        }
        public function getPrincipaleMarque()
        {
            $res = $this->marque->getPrincipaleMarques();
            return $res ;
        }
        public function getAllMarques()
        {
            $res= $this->marque->getAllMarques();
            return $res ;
        }
    }
?>