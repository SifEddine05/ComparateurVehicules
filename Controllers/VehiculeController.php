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
}
?>