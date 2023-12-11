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
                <h2>
                    <h1>Avec Notre Website</h1>
                    <a href="" class="typewrite" data-period="2000" data-type='[ "Découvrez l avenir automobile ", "Explorez les dernières actualités et publicités ", "Des conseils éclairés pour des décisions automobiles" ]'>
                        <span class="wrap"></span>
                    </a>
                </h2>
                </div>
                <div class="diaporama">
                        <div class="box"></div>
                    <?php
                    foreach($res as  $key => $d)
                    {
                        $class = ($key === 0) ? 'active' : '';
                    ?>
                            
                            <a class="<?php echo $class; ?>" href=<?php echo $d['url'] ?> >
                                <img class="<?php echo $class; ?>" src="<?php echo $d['image']; ?>" alt="diaporama"/>
                                <h3 class="<?php echo $class; ?>"><?php  if($d['Type']=="pub"){
                                echo "Publicite" ;
                            }
                            else{
                                echo "News";
                            } ?></h3>
                        </a>
                        

                    <?php
                    }
                    ?>
                </div>
            
            </div>
            <?php
            // print_r($res);
        } 

        public function menu()
        {
            ?>
            <div class="menu-container">
                <a href="/ComparateurVehicules">Accueil</a>
                <a href="News">News</a>
                <a  href="Comparateur">Comparateur</a>
                <a  href="Marque">Marque</a>
                <a  href="Avis">Avis</a>
                <a  href="GuideAchat">Guide Achat</a>
                <a  href="Contact">Contact</a>
            </div>
            <?php
        }

        public function footer()
        {
        ?>
        <footer>
            <div class="social-container">
                <?php
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
            <div class="list-liens">
                <a href="/ComparateurVehicules">Accueil</a>
                <a href="News">News</a>
                <a  href="Comparateur">Comparateur</a>
                <a  href="Marque">Marque</a>
                <a  href="Avis">Avis</a>
                <a  href="GuideAchat">Guide Achat</a>
                <a  href="Contact">Contact</a>
            </div>
            <p class="copyright">Auto Look © 2023</p>
        </footer>
        <?php
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