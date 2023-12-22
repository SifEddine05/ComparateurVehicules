<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/userModel.php');

class UserController{
    private $user ; 
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function NewUser($nom,$prenom,$sexe,$dateNaissance,$email ,$pwd)
    {
        $res = $this->user->NewUser($nom,$prenom,$sexe,$dateNaissance,$email ,$pwd) ; 
        return $res ;
    }
}