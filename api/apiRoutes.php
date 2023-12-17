

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');


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
    
        $to = "ks_sellami@esi.dz"; 
        $subject = "New Message from AutoLook";
    
        $email_message = "Nom : $name\n";
        $email_message .= "Email : $email\n\n";
        $email_message .= "Message :\n$message";
    
        // mail($to, $subject, $email_message);
        print("sendMessage") ;
    }

   

?>