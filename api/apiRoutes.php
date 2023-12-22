

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MessagesController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');


    if (isset($_POST['marqueId'])) {    
        $id = $_POST['marqueId'];
        $index = $_POST['index'];
        $vctl = new UserComponents();
        $result = $vctl->showOptionsModele($id,$index);
        echo $result;
    }

    if (isset($_POST['modeleId'])) {   
        $id = $_POST['modeleId'];
        $index = $_POST['index'];
        $vctl = new UserComponents();
        $result = $vctl->showOptionsVersion($id,$index);
        echo $result;
    }

    if (isset($_POST['version'])) {   
        $id = $_POST['version'];
        $index = $_POST['index'];
        $vctl = new UserComponents();
        $result = $vctl->showOptionsAnnee($id,$index);
        echo $result;
    }
    if (isset($_POST['message'])) 
    {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $msgctl = new MessageController();
        $res = $msgctl->sendMessage($name,$email,$message) ; 
        echo $res ; 
    }

    if(isset($_POST['dateNaissance']))
    {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $sexe = $_POST["sexe"];
        $dateNaissance = $_POST["dateNaissance"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashedpwd = md5($password); 

        $userctl = new UserController() ; 
        $res = $userctl->NewUser($nom,$prenom,$sexe,$dateNaissance,$email ,$hashedpwd) ; 
        echo $res ;
    }

    if(isset($_POST['emailLogin']))
    {
        $email = $_POST['emailLogin'] ; 
        $hashedpwd = $_POST['passwordLogin'] ; 
        $userctl = new UserController() ; 
        $res = $userctl->Login($email,$hashedpwd) ; 
        echo $res ; 
    }
   

?>