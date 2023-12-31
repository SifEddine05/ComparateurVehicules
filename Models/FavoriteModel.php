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
}

?>