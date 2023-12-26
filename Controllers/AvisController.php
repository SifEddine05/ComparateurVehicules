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
    }


?>