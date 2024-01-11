

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MessagesController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Pages/MarquesPage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/FavoriteController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/NewsController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/GuideController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');






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

    if(isset($_POST['nomEditMarque']))
    {
            
        
            $nom = $_POST["nomEditMarque"];
            $marqueId= $_POST["editMarqueId"];
            $paysOrigine = $_POST["paysOrigine"];
            $siegSociale = $_POST["siegSociale"];
            $anneeCreation = $_POST["anneeCreation"];
            $principale = isset($_POST["principale"]) ? 1 : 0; 
            $image = $_FILES["image"]["name"] ; 
            $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
            $marquectl = new MarqueController();
            $Id= $marquectl->GetLastId()[0]['ID'] + 1;

            $imageId = $marquectl->getMarqueById($marqueId)[0]['ImageId'];
            if($image)
            {
                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $targetFileName = "marque". $Id."." . $imageFileType; 
                $targetFile = $targetDirectory . $targetFileName;
                $uploadOk = 1;
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                    $imageId = $marquectl->AddMarqueLogo('/ComparateurVehicules/assets/'.$targetFileName) ;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }  
            }
            

            $res = $marquectl->EditMarque($marqueId,$nom,$imageId,$paysOrigine,$siegSociale,$anneeCreation,$principale);
            if($res==1)
            {
                header("Location: /ComparateurVehicules/admin/marques");
            }           
    }

    

    if(isset($_POST['DeleteVehiculeId']))
    {
        $vctl = new VehiculeController();
        $id = $_POST["DeleteVehiculeId"];
        $res = $vctl->DeleteVehicule($id);
        echo $res ;

    }

    if(isset($_POST['nomAddVehicule'])) //nomAddVehicule
    {
        $vctl= new VehiculeController();

        $modele = $_POST['Modele'];
        $ModeleId=$vctl->AddModele($modele);

        $nbrcyl=$_POST['NbrCylindres'];
        $nbrsoup=$_POST['NbrSouspapes'];
        $cylin=$_POST['Cylindree'];
        $puissDin=$_POST['PuissanceDIN'];
        $Couple=$_POST['CoupleMoteur'];
        $puissFis=$_POST['PuissanceFiscale'];
        $MoteurId = $vctl->AddMoteur($nbrcyl,$nbrsoup,$cylin,$puissDin,$Couple,$puissFis);

        $largeur=$_POST['Largeur'];
        $hauteur=$_POST['Hauteur'];
        $nbrPlaces=$_POST['NbrPlaces'];
        $VolCoffre=$_POST['VolCoffre'];
        $DimensionId=$vctl->AddDimensions($largeur,$hauteur,$nbrPlaces,$VolCoffre);


        $vitesseMax=$_POST['VitesseMax'];
        $Acceleration=$_POST['Acceleration'];
        $PerformancesId=$vctl->AddPerformance($vitesseMax,$Acceleration);

        $Energie=$_POST['Energie'];
        $Consommation=$_POST['Consommation'];
        $Version=$_POST['Version'];
        $Annees=$_POST['Annee'];
        $Boite=$_POST['BoiteVitesse'];
        $NbVitesse=$_POST['NbrVitesses'];
        $CaracteristiqueId = $vctl->AddCaracteristique($Energie,$Consommation,$Version,$Annees,$Boite,$NbVitesse);
        echo $CaracteristiqueId ;

        
        $Nom=$_POST['nomAddVehicule'];
        $MarqueId=$_POST['Marque'];
        $Prix=$_POST['Prix'];
        $VehiculeId = $vctl->AddVehicule($Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix);
        echo $VehiculeId ;
        
        
        $image = $_FILES["image"]["name"] ; 
        echo $image;
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'];
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $targetFileName = "vehicule". $Id."." . $imageFileType; 
        $targetFile = $targetDirectory . $targetFileName;
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            $imageId = $vctl->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $res = $vctl->AddVehiculeImage($imageId,$VehiculeId) ;
        echo $res ;
        if($res==1)
        {
            header("Location: /ComparateurVehicules/admin/vehicules?id=".$MarqueId);
        }
    }
    



    // ------------------------------------Edit
    if(isset($_POST['nomEditVehicule']))
    {
        print("hello");
        $vctl= new VehiculeController();

        $modele = $_POST['Modele'];
        $ModeleId=$_POST['ModeleId'];
        $vctl->editModele($ModeleId, $modele);

        $nbrcyl=$_POST['NbrCylindres'];
        $nbrsoup=$_POST['NbrSouspapes'];
        $cylin=$_POST['Cylindree'];
        $puissDin=$_POST['PuissanceDIN'];
        $Couple=$_POST['CoupleMoteur'];
        $puissFis=$_POST['PuissanceFiscale'];
        $MoteurId = $_POST['MoteurId'];
        $vctl->editMoteur($MoteurId, $nbrcyl, $nbrsoup, $cylin, $puissDin, $Couple, $puissFis);


        $largeur=$_POST['Largeur'];
        $hauteur=$_POST['Hauteur'];
        $nbrPlaces=$_POST['NbrPlaces'];
        $VolCoffre=$_POST['VolCoffre'];
        $DimensionId=$_POST['DimensionsId'];
        $vctl->editDimensions($DimensionId, $largeur, $hauteur, $nbrPlaces, $VolCoffre);



        $vitesseMax=$_POST['VitesseMax'];
        $Acceleration=$_POST['Acceleration'];
        $PerformancesId=$_POST['PerformancesId'];
        $vctl->editPerformance($PerformancesId, $vitesseMax, $Acceleration);



        $Energie=$_POST['Energie'];
        $Consommation=$_POST['Consommation'];
        $Version=$_POST['Version'];
        $Annees=$_POST['Annee'];
        $Boite=$_POST['BoiteVitesse'];
        $NbVitesse=$_POST['NbrVitesses'];
        $CaracteristiqueId = $_POST['CaracteristiqueId'];
        $vctl->editCaracteristique($CaracteristiqueId, $Energie, $Consommation, $Version, $Annees, $Boite, $NbVitesse);


        
        $Nom=$_POST['nomEditVehicule'];
        $MarqueId=$_POST['Marque'];
        $Prix=$_POST['Prix'];
        $VehiculeId = $_POST['VehiculeId'];
        $vctl->editVehicule($VehiculeId, $Nom, $MarqueId, $ModeleId, $MoteurId, $DimensionId, $PerformancesId, $CaracteristiqueId, $Prix);

        $image = $_FILES["image"]["name"] ; 
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'] + 1;
        $imageId = $_POST['ImageId'];
        if($image)
        {
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFileName = "vehicule". $Id."." . $imageFileType; 
            $targetFile = $targetDirectory . $targetFileName;
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $imageId = $vctl->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }  
        }

        $vctl->EditVehiculeImage($imageId,$VehiculeId) ;
        header("Location: /ComparateurVehicules/admin/vehicules?id=".$MarqueId);


    }

    if(isset($_POST['AccepteAvisId']))
    {
        $avisctl = new AvisController();
        $AvisId = $_POST['AccepteAvisId'] ;

        $res= $avisctl->AccepteAvis($AvisId) ;

        echo $res ;

    }

    if(isset($_POST['RefuseAvisId']))
    {
        $avisctl = new AvisController();
        $AvisId = $_POST['RefuseAvisId'] ;
        $res= $avisctl->RefuserAvis($AvisId) ;
        echo $res ;
    }

    if(isset($_POST['BloqueUserId']))
    {
        $userId=$_POST['BloqueUserId'];
        $userctl = new userController();
        $res=$userctl->BloquerUser($userId);
        echo $res ; 
    }

    if(isset($_POST['titreAddNews']))
    {
        $newsctl = new NewsController() ;
        $vctl = new VehiculeController();

        $titre =  $_POST['titreAddNews'] ;
        $description =   $_POST['Description'] ;
        $text =   $_POST['Text'] ;

        $NewsId = $newsctl->AddNews($titre , $description,$text);

        $image = $_FILES["image"]["name"] ; 
        echo $image;
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'];
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $targetFileName = "news". $Id."." . $imageFileType; 
        $targetFile = $targetDirectory . $targetFileName;
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            $imageId = $newsctl->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            $res = $newsctl->AddImageNews($imageId,$NewsId);
            if($res==1)
            {
                header("Location: /ComparateurVehicules/admin/news");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }




    }



    if(isset($_POST['DeleteNewsId']))
    {
        $newsId=$_POST['DeleteNewsId'];
        $newsctl = new NewsController();
        $res=$newsctl->DeleteNews($newsId);
        echo $res ; 
    }


    if(isset($_POST['titreEditNews']))
    {
        $newsctl = new NewsController() ;
        $vctl = new VehiculeController();

        $titre =  $_POST['titreEditNews'] ;
        $description =   $_POST['Description'] ;
        $text =   $_POST['Text'] ;
        $NewsId= $_POST['NewsId'];



        $newsctl->EditNews($titre , $description,$text ,$NewsId);


        $image = $_FILES["image"]["name"] ; 
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'] + 1;
        $imageId= $_POST['ImageId'];
        if($image)
        {
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFileName = "news". $Id."." . $imageFileType; 
            $targetFile = $targetDirectory . $targetFileName;
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $imageId = $newsctl->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }  
        }
        $res = $newsctl->EditImageNews($imageId,$NewsId);
        header("Location: /ComparateurVehicules/admin/news");
    }

    if(isset($_POST['AccepteUserId']))
    {
        $userId = $_POST['AccepteUserId'];
        $user = new UserController();
        $res = $user->AccepteUser($userId);
        echo $res;
    }


    if(isset($_POST['titreAddGuide']))
    {
        $guide = new GuideController();
        $vctl = new VehiculeController();
    
        $titre = $_POST['titreAddGuide'];
        $Description = $_POST['Description'];
        $Text = $_POST['Text'] ; 

        $image = $_FILES["image"]["name"] ; 
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'];
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $targetFileName = "guide". $Id."." . $imageFileType; 
        $targetFile = $targetDirectory . $targetFileName;
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            $imageId = $guide->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            $res = $guide->AddGuide($titre,$imageId, $Description,$Text);
            if($res)
            {
                header("Location: /ComparateurVehicules/admin/params/guide");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if(isset($_POST['titreEditGuide']))
    {
        $guide = new GuideController();
        $vctl = new VehiculeController();

        $titre = $_POST['titreEditGuide'];
        $Description = $_POST['Description'];
        $Text = $_POST['Text'] ; 
        $imageId = $_POST['ImageId'];
        $guideId = $_POST['guideId'];

        $image = $_FILES["image"]["name"] ; 
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'];
        if($image)
        {
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFileName = "guide". $Id."." . $imageFileType; 
            $targetFile = $targetDirectory . $targetFileName;
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $imageId = $guide->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }  
        }
        $res = $guide->EditGuide($titre,$imageId, $Description,$Text,$guideId);
        echo $res ;
        header("Location: /ComparateurVehicules/admin/params/guide");


    }

    if(isset($_POST['DeleteGuideId']))
    {
        $guide = new GuideController();
        $guideId = $_POST['DeleteGuideId'] ; 
        $res = $guide->DeleteGuide($guideId) ;
        echo $res ; 
    }

    if(isset($_POST['AddNameContact']))
    {
        $contact = new ContactController();
        $vctl = new VehiculeController();
        $Name = $_POST['AddNameContact'];
        $Type = $_POST['Type'];
        $url =  $_POST['url'];


        $image = $_FILES["image"]["name"] ; 
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/assets/'; 
        $Id= $vctl->GetLastId()[0]['ID'];
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $targetFileName = "contact". $Id."." . $imageFileType; 
        $targetFile = $targetDirectory . $targetFileName;
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            $imageId = $contact->AddImage('/ComparateurVehicules/assets/'.$targetFileName) ;
            $res = $contact->AddContact($Name,$Type, $url,$imageId);
            if($res)
            {
                header("Location: /ComparateurVehicules/admin/params/contact");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    



  
    
   

?>