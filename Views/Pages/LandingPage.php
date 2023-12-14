<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/DiaporamaController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');

    class LandingPage {
        private $UserComponents ;
        private $diapctrl ;
        private $vehctl ; 
 

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
            $this->diapctrl = new DiaporamaController();
            $this->vehctl = new VehiculeController();


        }
        public function Diaporama()
        {
            $res = $this->diapctrl->getDiaporama();
            ?>
            <div class="container-diapo">
                <div class="diapo-text">
                <h2>
                    <h1>Avec Notre Website</h1>
                    <a  class="typewrite" data-period="2000" data-type='[ "Découvrez l avenir automobile ", "Explorez les dernières actualités et publicités ", "Des conseils éclairés pour des décisions automobiles" ]'>
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
        public function guideAchatButton()
        {
        ?>
        <div class="sectionAchat">
            <div class='guideAchatLien' >
                <div>
                    <img src="/ComparateurVehicules/assets/GuideAchat.png" alt="guideAcht" width="600px" />
                </div>
                <div>
                    <h1 class="titles" id="titleachat">Notre guide d'achat à votre service</h1>
                    <div>
                        <div class="icon-container">
                            <img src="/ComparateurVehicules/assets/icon1.png" alt="icon" />
                            <p>Analyse objective des prix</p>
                        </div>
                        <div class="icon-container">
                            <img src="/ComparateurVehicules/assets/icon2.png" alt="icon" />
                            <p>Visibilité complète sur l'historique du véhicule</p>
                        </div>
                        <div class="icon-container">
                            <img src="/ComparateurVehicules/assets/icon3.png" alt="icon" />
                            <p>Simulateur de financement pour maîtriser votre budget</p>
                        </div>
                        <div class="icon-container">
                            <img src="/ComparateurVehicules/assets/icon4.png" alt="icon" />
                            <p>Conseils d'entretien pour une projection claire sur l'avenir</p>
                        </div>   
                    </div>

                </div>
            </div>
            <button id="NavigateGuide"> Naviguer au guide d'achat  </button>
        </div>

        <?php
        }
        public function PopulaireComparations() 
        {
            $bestcomps = $this->vehctl->getPopulaireComparations() ;
        ?>
        <div class="comp-container">
            <h1 class="titles">Comparaisons populaires de voitures</h1>
            <div class='conainer-bestcomp'>

                <?php 
                    foreach($bestcomps as $best)
                    {
                    ?>

                        <a href='/ComparateurVehicules/compare?V1=<?php echo $best['VehiculeId1']?>&V2=<?php echo $best['VehiculeId2']?>' class='comp'>
                            <div class='element1' style="background-image: url('<?php echo $best['url1']?>'); background-size: cover; "><p><?php echo $best['Nom1']?></p></div>
                            <p class="VS">VS</p>
                            <div class='element2' style="background-image: url('<?php echo $best['url2']?>'); background-size: cover; "><p><?php echo $best['Nom2']?></p></div>
                        </a>
                <?php 
                    }
                    ?>
            </div>
           
        </div>
        <?php
        }


        public function getPage()
        {
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->Diaporama() ; 
            $this->UserComponents->menu() ; 
            $this->UserComponents->principaleMarques();
            $this->UserComponents->formComparation();
            $this->guideAchatButton();
            $this->PopulaireComparations();
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
    }

?>