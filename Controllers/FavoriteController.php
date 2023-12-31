<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/FavoriteModel.php');
 class FavoriteController {
    private $favorite ; 
    public function __construct()
    {
        $this->favorite = new FavoriteModel();
    }
    public function AddFavorite($Vid)
    {
        $res = $this->favorite->AddFavorite($Vid) ; 
        return $res ; 
    }
    public function getFavoriteByUV($Vid)
    {
        $res = $this->favorite->getFavoriteByUV($Vid) ; 
        return $res ; 
    }
    public function DeleteFavorite($Vid)
    {
        $res = $this->favorite->DeleteFavorite($Vid) ; 
        return $res ; 
    }
    public function getFavoriteByU()
    {
        $res = $this->favorite->getFavoriteByU() ; 
        return $res ;
    }
 } 
?>
