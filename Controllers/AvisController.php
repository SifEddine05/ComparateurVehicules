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
        public function getNbrAvis($id)
        {
            $res = $this->Avis->getNbrAvis($id) ; 
            return $res ; 
        }
        public function getAvisByPage($id,$offset,$records_per_page)
        {
            $res = $this->Avis->getAvisByPage($id,$offset,$records_per_page) ; 
            return $res ;
        }
        public function getAllAvisVehcicule()
        {
            $res = $this->Avis->getAllAvisVehcicule() ; 
            return $res ;
        }
        public function AccepteAvis($id)
        {
            $res = $this->Avis->AccepteAvis($id);
            return $res ;
        }
        public function RefuserAvis($id)
        {
            $res = $this->Avis->RefuserAvis($id);
            return $res ;
        }

}


?>