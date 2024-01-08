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


    public function AddModele($modele)
    {
        $res =$this->vehicule->AddModele($modele);
        return $res ;
    }
    public function AddMoteur($nbrcyl,$nbrsoup,$cylin,$puissDin,$Couple,$puissFis){
    
        $res =$this->vehicule->AddMoteur($nbrcyl,$nbrsoup,$cylin,$puissDin,$Couple,$puissFis);
        return $res ;
    }
    public function AddDimensions($largeur,$hauteur,$nbrPlaces,$VolCoffre)
    {
        $res =$this->vehicule->AddDimensions($largeur,$hauteur,$nbrPlaces,$VolCoffre);
        return $res ;
    }
    public function AddPerformance($vitesseMax,$Acceleration)
    {
        $res =$this->vehicule->AddPerformance($vitesseMax,$Acceleration);
        return $res ;
    }
    public function AddCaracteristique($Energie,$Consommation,$Version,$Annees,$Boite,$NbVitesse)
    {
        $res =$this->vehicule->AddCaracteristique($Energie,$Consommation,$Version,$Annees,$Boite,$NbVitesse);
        return $res ;
    }
    public function AddVehicule($Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix)
    {
        $res =$this->vehicule->AddVehicule($Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix);
        return $res ;
    }
     
}
?>