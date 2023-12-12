<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DiaporamaModel.php');
 class DiaporamaController {
    private $diaporama ; 
    public function __construct()
    {
            $this->diaporama = new DiaporamaModel();
    }
    public function getDiaporama()
    {
        $res = $this->diaporama->getDiaporama() ; 
        return $res ; 
    }
 } 
?>