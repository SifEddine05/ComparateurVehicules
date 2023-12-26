<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');

class VehiculePage {
    private $UserComponents ;
    private $Vctl ;
    private $avisctl ; 
    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->Vctl = new VehiculeController();
        $this->avisctl = new AvisController();
    }

    public function vehiculeInformations($id)
    {
        $vechinfo = $this->Vctl->getVehiculeById($id)[0];
    ?>
    <div class="MarqueInfos-container">
            <h5 class='titles'>Les Informations de la vehivule</h5>
            <div class="MarqueInfos">
                <div class="MarqueNL">
                    <div class="MarqueName" id="VehiculeName">
                        <h4><?php echo $vechinfo['Nom'] ?></h4>
                    </div>
                    <div class="MarqueLogo" id="VehiculeImage">
                        <img src='<?php echo $vechinfo['image'] ?>' width="100%"/>
                    </div>
                </div> 

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Marque</p>
                    <p class='info'><?php echo $vechinfo['marque']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Modèle</p>
                    <p class='info'><?php echo $vechinfo['modele']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Version</p>
                    <p class='info'><?php echo $vechinfo['Version']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Prix</p>
                    <p class='info'><?php echo $vechinfo['Prix']?> $</p>
                </div>
                <div class='showBtn-container'>
                    <button id='showMoreBtn'>Voir Plus </button>  
                </div>

            <div id='moreInfos'>
                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Largeur</p>
                    <p class='info'><?php echo $vechinfo['Largeur']?> m</p>
                </div>
                
                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Hauteur</p>
                    <p class='info'><?php echo $vechinfo['Hauteur']?> m</p>
                </div>
                
                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Capacité</p>
                    <p class='info'><?php echo $vechinfo['NombrePlaces']?> places</p>
                </div>
                
                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Volume de Coffre</p>
                    <p class='info'><?php echo $vechinfo['VolumeCoffre']?> litres</p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Energie</p>
                    <p class='info'><?php echo $vechinfo['Energie']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Consommation</p>
                    <p class='info'><?php echo $vechinfo['Consommation']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Boite de Vitesse</p>
                    <p class='info'><?php echo $vechinfo['Boite']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Nombre des Vitesses</p>
                    <p class='info'><?php echo $vechinfo['NbVitesses']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Vitesse Maximale</p>
                    <p class='info'><?php echo $vechinfo['VitesseMaximum']?> km/h</p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Accélération</p>
                    <p class='info'><?php echo $vechinfo['Acceleration']?> s</p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Nombre de Cylindres</p>
                    <p class='info'><?php echo $vechinfo['NombreCylindres']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Nombre de soupapes par cylindre</p>
                    <p class='info'><?php echo $vechinfo['NombreSoupapesParCylindre']?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Cylindrée</p>
                    <p class='info'><?php echo $vechinfo['Cylindree']?> L</p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Puissance DIN</p>
                    <p class='info'><?php echo $vechinfo['PuissanceDIN']?> Ch</p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Couple moteur</p>
                    <p class='info'><?php echo $vechinfo['CoupleMoteur']?> Nm</p>
                </div>


                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Puissance Fiscale</p>
                    <p class='info'><?php echo $vechinfo['PuissanceFiscale']?> Cv</p>
                </div>
                <div class='showBtn-container'>
                    <button id='showLessBtn'>Voir Moins </button>  
                </div>
            </div>  

                
            </div>
            
        </div>

    <?php
    }
    // Comment.png
    /* SELECT * FROM `avis` 
INNER JOIN user on user.UserId=avis.UserId
WHERE VehiculeId=7 and Confirmer=1 
ORDER By Apprecie DESC*/

    public function BestAvis($id)
    { 
        $bestAvis = $this->avisctl->getBestAvis($id);
    
    ?>
        <div class='Best-Avis-Section'>
            <div class='Title'>
                <h5 class='titles'>Les Avis les plus appréciés</h5>
                <a href='/ComparateurVehicules/avis'>Voir tous les avis</a>
            </div>
            <?php 
            if($bestAvis)
            {
            ?>
            <div class='BestAvis-container'>
                <div class='Avis-Container'>
                    <div class='Avis'>
                        <img src='/ComparateurVehicules/assets/Comment.png' alt='comment' />
                        <h6><?php echo $bestAvis[0]['Commentaire'] ?></h6>
                        <p>Note : <?php echo $bestAvis[0]['Note'] ?>/5⭐</p>
                    </div>
                    <h3> <span>👤</span> <?php echo $bestAvis[0]['Nom'].' '.$bestAvis[2]['Prenom'] ?></h3>
                </div>

                <div class='Avis-Container'>
                    <div class='Avis'>
                        <img src='/ComparateurVehicules/assets/Comment.png' alt='comment' />
                        <h6><?php echo $bestAvis[1]['Commentaire'] ?></h6>
                        <p>Note : <?php echo $bestAvis[1]['Note'] ?>/5⭐</p>
                    </div>
                    <h3> <span>👤</span><?php echo $bestAvis[1]['Nom'].' '.$bestAvis[2]['Prenom'] ?></h3>
                </div>

                <div class='Avis-Container'>
                    <div class='Avis'>
                        <img src='/ComparateurVehicules/assets/Comment.png' alt='comment' />
                        <h6><?php echo $bestAvis[2]['Commentaire'] ?></h6>
                        <p>Note : <?php echo $bestAvis[2]['Note'] ?>/5⭐</p>
                    </div>
                    <h3> <span>👤</span> <?php echo $bestAvis[2]['Nom'].' '.$bestAvis[2]['Prenom'] ?></h3>
                </div>
                
            </div>
            <?php
            }else {
                echo "<h3 style='color:red'>il n'y a pas d'avis pour cette vethicule</h3>" ;
            }
            ?>

        </div>
    <?php
    }    



   
    
    public function getPage()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : -1;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->vehiculeInformations($id);
        $this->UserComponents->formComparation();
        $this->BestAvis($id);
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
}
?>