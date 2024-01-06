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
        public function getMarqueById($id)
        {
            $res= $this->marque->getMarqueById($id);
            return $res ;
        }
        public function getPrincipaleVehicules($id)
        {
            $res= $this->marque->getPrincipaleVehicules($id);
            return $res ;
        }
        public function getAllVehicules($id)
        {
            $res= $this->marque->getAllVehicules($id);
            return $res ;
        }
        public function getAllMarquesInformations()
        {
            $res= $this->marque->getAllMarquesInformations();
            return $res ;
        }
    }
?>