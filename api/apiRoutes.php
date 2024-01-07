

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MessagesController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Pages/MarquesPage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/FavoriteController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');




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


    
    if(isset($_POST['Logout']))
    {
        setcookie("user", "", time() - 3600, "/");
        echo 1 ;
    }
    if(isset($_POST['idVech']))
    {
        $id=$_POST['idVech'];
        $type = $_POST['type'];
        $marque = new UserComponents();
        echo $marque->VehiculeInformations($id,$type);
    }

    if(isset($_POST['IdVehicule'])) {
        $id = $_POST['IdVehicule'];
        $VehiculeController = new VehiculeController();
        $res = $VehiculeController->getVehiculeById($id);
    
        $jsonResponse = json_encode($res);
    
        header('Content-Type: application/json');
    
        echo $jsonResponse;
    }
    if(isset($_POST['NbrStars'])) {
        $nbrStars = $_POST['NbrStars'];
        $comment = $_POST['comment'];
        $Vid = $_POST['Vid']; 
        $Mid = $_POST['Mid'];

        $avis = new AvisController() ; 
        $res = $avis->AddAvis($nbrStars,$comment,$Vid,$Mid) ; 
        echo $res ;
    }
    if(isset($_POST['NewFav'])) {
        $Vid = $_POST['NewFav'] ;
        $favorite = new FavoriteController() ; 
        $res = $favorite->AddFavorite($Vid) ; 
        echo $res ; 
    }

    if(isset($_POST['DelFav'])) {
        $Vid = $_POST['DelFav'] ;
        $favorite = new FavoriteController(); 
        $res = $favorite->DeleteFavorite($Vid) ; 
        echo $res ; 
    }



    if(isset($_POST['AdminEmailLogin']))
    {
        $email = $_POST['AdminEmailLogin'] ; 
        $hashedpwd = $_POST['passwordLogin'] ; 
        $userctl = new UserController() ; 
        $res = $userctl->AdminLogin($email,$hashedpwd) ; 
        echo $res ; 
    }

    if(isset($_POST['nomAddMarque']))
    {
            $marquectl = new MarqueController();
            $Id= $marquectl->GetLastId()[0]['ID'];
        
            $nom = $_POST["nomAddMarque"];
            $paysOrigine = $_POST["paysOrigine"];
            $siegSociale = $_POST["siegSociale"];
            $anneeCreation = $_POST["anneeCreation"];
            $principale = isset($_POST["principale"]) ? 1 : 0; 

            
            $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFileName = "marque". $Id."." . $imageFileType; 
            $targetFile = $targetDirectory . $targetFileName;
            $uploadOk = 1;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $imageId = $marquectl->AddMarqueLogo('/ComparateurVehicules/assets/'.$targetFileName) ; 
                $res = $marquectl->AddMarque($nom,$imageId,$paysOrigine,$siegSociale,$anneeCreation,$principale);

                echo $res ;
                if($res==1)
                {
                    header("Location: /ComparateurVehicules/admin/marques");
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }   
    }

    if(isset($_POST['DeleteMarqueId']))
    {
        $marquectl = new MarqueController();
        $id = $_POST["DeleteMarqueId"];
        $res = $marquectl->DeleteMarque($id);
        echo $res ;

    }

    

  
    
   

?>