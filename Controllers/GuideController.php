<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/GuideModel.php');

class GuideController{
    private $guide ; 
    public function __construct()
    {
        $this->guide = new GUideModel();
    }

    public function getGuidesByPage($offset,$records_per_page)
    {
        $res = $this->guide->getGuidesByPage($offset,$records_per_page);
        return $res ;
    }
    public function getNbrGuides()
    {
        $res = $this->guide->getNbrGuides();
        return $res ; 
    }
    public function getGuideById($id)
    {
        $res = $this->guide->getGuideById($id);
        return $res ;
    }
    public function getAllGuide()
    {
        $res = $this->guide->getAllGuide();
        return $res ; 
    }

    public function AddImage($url)
    {
        $res = $this->guide->AddImage($url);
        return $res ; 
    }

    public function AddGuide($titre,$imageId, $description,$text)
    {
        $res = $this->guide->AddGuide($titre,$imageId, $description,$text);
        return $res ; 
    }
    public function EditGuide($titre,$imageId, $description,$text,$guideId)
    {
        $res = $this->guide->EditGuide($titre,$imageId, $description,$text,$guideId);
        return $res ; 
    }

}
?>