<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/VehiculeModel.php');

class VehiculeController{
    private $vehicule ; 
    public function __construct()
    {
        $this->vehicule = new VehiculeModel();
    }

    public function getModeleByMarque($marque)
    {
        $res = $this->vehicule->getModeleByMarque($marque) ; 
        return $res ; 
    }
    public function getVersionByModele($modele)
    {
        $res = $this->vehicule->getVersionByModele($modele) ; 
        return $res ; 
    }

    public function getAnneeByVersion($version)
    {
        $res = $this->vehicule->getAnneeByVersion($version) ; 
        return $res ; 
    }
    public function getPopulaireComparations()
    {
        $res =$this->vehicule->getPopulaireComparations();
        return $res ;
    }
    public function getVehiculeById($id)
    {
        $res =$this->vehicule->getVehiculeById($id);
        return $res ;
    }
    public function getPopulaireComparationsById($id)
    {
        $res =$this->vehicule->getPopulaireComparationsById($id);
        return $res ;
    }
   
    public function getAllVehiculesIDs()
    {
        $res =$this->vehicule->getAllVehiculesIDs();
        return $res ;
    }
    public function getAllVehiculeByMarqueId($id)
    {
        $res =$this->vehicule->getAllVehiculeByMarqueId($id);
        return $res ;
    }
    
    

    
}
?>