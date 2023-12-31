<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 
    class FavoriteModel{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseModel();
    }
    public function AddFavorite($Vid)
    {
        $userId = $_COOKIE['user'];
        $conn = $this->db->connect();
        $query = $conn->prepare("INSERT INTO `favorite`( `vehiculeID`, `userID`) VALUES (?,?)") ;
       $query->execute(array($Vid,$userId));
       $this->db->disconnect($conn);
       echo 1;
    }
    public function DeleteFavorite($Vid)
    {
        $userId = $_COOKIE['user'];
        $conn = $this->db->connect();
        $query = $conn->prepare("DELETE FROM `favorite` WHERE favorite.userID=? and favorite.vehiculeID=?") ;
       $query->execute(array($userId,$Vid));
       $this->db->disconnect($conn);
       echo 1;
    }
    public function getFavoriteByUV($Vid)
    {
        $userId = $_COOKIE['user'];
        $conn = $this->db->connect();
        $query = $conn->prepare("SELECT Count(favoriteID)as nbr from favorite WHERE favorite.vehiculeID=? and favorite.userID=?") ;
        $query->execute(array($Vid,$userId));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->db->disconnect($conn);
        return $results;
    }

}

?>