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
            $nbr = count($res);
            ?>
            <div class="LatestNews-container">

                <div class="container-diapo">
                    <div class="diapo-text">
                    <h2>
                        <h1>Avec Notre Website</h1>
                        <a  class="typewrite" data-period="2000" data-type='[ "Découvrez l avenir automobile ", "Explorez les dernières actualités et publicités ", "Des conseils éclairés pour des décisions automobiles" ]'>
                            <span class="wrap"></span>
                        </a>
                    </h2>
                </div>
                <div class="LatestNews">
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <?php
                                for ($i = 0; $i < $nbr; $i++) {
                                ?>
                                    <button type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $i ?>" class="<?php if($i==0) echo 'active'?>"></button>
                            <?php }
                            ?>
                        </div>
                        <div class="carousel-inner">
                            <?php 
                                foreach($res as $index => $el)
                                {?>
                                    <div class="carousel-item <?php if($index==0) echo 'active'?>">
                                        <a href="<?php echo $el['url']?>" >
                                            <img src="<?php echo $el['image']?>"  class="d-block w-100">
                                            <h3 class='diapo-type'><?php  if($el['Type']=="pub"){
                                            echo "Publicite" ;
                                        }
                                        else{
                                            echo "News";
                                        } ?></h3>
                                        </a>
                                    </div>
                          <?php }
                            
                            ?>
                            
                        
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                            </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <?php
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
            <a href="/ComparateurVehicules/guideachat" id="NavigateGuide"> Naviguer au guide d'achat  </a>
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
            $this->UserComponents->principaleMarques(0);
            $this->UserComponents->formComparation();
            $this->guideAchatButton();
            $this->PopulaireComparations();
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
    }

?>