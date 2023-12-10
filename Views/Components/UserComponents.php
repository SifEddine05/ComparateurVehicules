<?php
    require_once("Controllers/ContactController.php");
    require_once("Controllers/DiaporamaController.php");

        
        
          

    class UserComponents {
        private $Conctrl ; 
        private $diapctrl ; 
        public function __construct()
        {
            $this->Conctrl = new ContactController();
            $this->diapctrl = new DiaporamaController();


        }
        public function Header()
        {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Document</title>
            </head>';
        }
        
        public function NavBar()
        {
            echo "
            <div class='NavBar'>
                <img src='assets/logoo.png' alt='logo' width='80px'/>
                <div class='contacts-container'>";
            $contacts = $this->Conctrl->getContacts();

            foreach($contacts as $ct)
            {
                ?>
                    <a  href="<?php echo $ct['url'] ?>" target="_blank" >
                        <img src="<?php echo $ct['logo'] ?>"  class="img-contact" widht="75px" alt="contact" /> 
                    </a>
                    
                    <?php
                ;
            }
            ?>
                </div>
                <div class="button-container">
                    <button class="button">Login</button>
                    <button class="button">SignUp</button>
                </div>
            </div>            
         <?php   
        }


        public function Diaporama()
        {
            $res = $this->diapctrl->getDiaporama();
            ?>
            <div class="container-diapo">
                <div class="diapo-text">
                    <h2>Dernieres Nouvelles Automobiles</h2>
                    <p>
                    Découvrez l'avenir de l'automobile sur notre site comparateur de véhicules, une destination complète pour une expérience automobile simplifiée. Explorez les dernières actualités, publicités et marques renommées avec des informations détaillées. Utilisez notre outil de comparaison intuitif pour évaluer spécifications, prix et avis. Notre guide d'achat propose des conseils éclairés, tandis que l'espace administration assure une gestion optimale. Connectez-vous pour un espace personnel, où vous pouvez sauvegarder favoris, noter et commenter. Avec une interface conviviale et des fonctionnalités innovantes, notre site redéfinit l'expérience automobile, offrant tout pour des décisions informées et passionnantes.
                    </p>
                </div>
                <div class="diaporama">
                        <div class="box"></div>
                    <?php
                    foreach($res as  $key => $d)
                    {
                        $class = ($key === 0) ? 'active' : '';
                    ?>
                        
                        <img class="<?php echo $class; ?>" src="<?php echo $d['image']; ?>" alt="diaporama"/>
                        <h3 class="<?php echo $class; ?>"><?php  if($d['Type']=="pub"){
                            echo "Publicite" ;
                        }
                        else{
                            echo "News";
                        } ?></h3>

                    <?php
                    }
                    ?>
                </div>
            
            </div>
            <?php
            // print_r($res);
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>