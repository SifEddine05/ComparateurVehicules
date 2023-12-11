<?php
    require_once("Models/MarqueModel.php");

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
    }
?>