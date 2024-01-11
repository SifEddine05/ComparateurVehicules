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
    
    public function AddDiapo($imageId, $url,$Type)
    {
        $res = $this->diaporama->AddDiapo($imageId, $url,$Type) ; 
        return $res ; 
    }
    public function AddImage($url)
    {
        $res = $this->diaporama->AddImage($url) ; 
        return $res ; 
    }
    public function getDiapoById($id)
    {
        $res = $this->diaporama->getDiapoById($id) ; 
        return $res ; 
    }
    public function EditDiapo($imageId, $url,$Type,$diapoId)
    {
        $res = $this->diaporama->EditDiapo($imageId, $url,$Type,$diapoId) ; 
        return $res ; 
    }
    public function DeleteDiapo($diapoId)
    {
        $res = $this->diaporama->DeleteDiapo($diapoId) ; 
        return $res ; 
    }

 } 
?>