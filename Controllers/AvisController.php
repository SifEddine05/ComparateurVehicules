<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/AvisModel.php');
    class AvisController {
        private $Avis ; 
        public function __construct()
        {
            $this->Avis = new AvisModel();
        }
        public function getBestAvis($id)
        {
            $res = $this->Avis->getBestAvis($id) ;
            return $res ;
        }
        public function AddAvis($stars ,$comment,$Vid,$Mid)
        {
            $res = $this->Avis->AddAvis($stars ,$comment,$Vid,$Mid) ;
            return $res ;
        }
        public function getBestAvisMarque($id)
        {
            $res = $this->Avis->getBestAvisMarque($id) ;
            return $res ;
        }
    }


?>