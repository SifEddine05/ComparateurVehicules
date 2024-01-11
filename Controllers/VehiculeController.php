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
     
    public function GetLastId()
    {
        $res =$this->vehicule->GetLastId();
        return $res ;
    }
    public function AddImage($url)
    {
        $res =$this->vehicule->AddImage($url);
        return $res ; 
    }
    public function AddVehiculeImage($imageId,$VehiculeId) 
    {
        $res =$this->vehicule->AddVehiculeImage($imageId,$VehiculeId);
        return $res ; 
    }
    function DeleteVehicule($id)
    {
        $res =$this->vehicule->DeleteVehicule($id);
        return $res ; 
    }


    public function editModele($modeleId, $newName) {
        return $this->vehicule->EditModele($modeleId, $newName);
    }

    public function editMoteur($moteurId, $nbrcyl, $nbrsoup, $cylin, $puissDin, $Couple, $puissFis) {
        return $this->vehicule->EditMoteur($moteurId, $nbrcyl, $nbrsoup, $cylin, $puissDin, $Couple, $puissFis);
    }

    public function editDimensions($dimensionId, $largeur, $hauteur, $nbrPlaces, $VolCoffre) {
        return $this->vehicule->EditDimensions($dimensionId, $largeur, $hauteur, $nbrPlaces, $VolCoffre);
    }

    public function editPerformance($performanceId, $vitesseMax, $Acceleration) {
        return $this->vehicule->EditPerformance($performanceId, $vitesseMax, $Acceleration);
    }

    public function editCaracteristique($caracteristiqueId, $Energie, $Consommation, $Version, $Annees, $Boite, $NbVitesse) {
        return $this->vehicule->EditCaracteristique($caracteristiqueId, $Energie, $Consommation, $Version, $Annees, $Boite, $NbVitesse);
    }

    public function editVehicule($vehiculeId, $Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix) {
        return $this->vehicule->EditVehicule($vehiculeId, $Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix);
    }
    public function EditVehiculeImage($imageId, $vehiculeId) 
    {
        $res= $this->vehicule->EditVehiculeImage($imageId, $vehiculeId);
        return $res ;
    }


    public function AddCompare($Vid1 ,$Vid2)
    {
        $res= $this->vehicule->AddCompare($Vid1 ,$Vid2);
        return $res ;
    }
}
?>