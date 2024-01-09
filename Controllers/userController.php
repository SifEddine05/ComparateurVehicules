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

    public function Login($email,$password)
    {
        $res = $this->user->Login($email,$password) ; 
        return $res ; 
    }
    public function AdminLogin($email,$password)
    {
        $res = $this->user->AdminLogin($email,$password) ; 
        return $res ; 
    }
    public function BloquerUser($id)
    {
        $res = $this->user->BloquerUser($id) ; 
        return $res ;
    }
}