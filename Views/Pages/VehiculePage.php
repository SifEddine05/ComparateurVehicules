<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/FavoriteController.php');


class VehiculePage {
    private $UserComponents ;
    private $Vctl ;
    private $avisctl ; 
    private $favorite ;
    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->Vctl = new VehiculeController();
        $this->avisctl = new AvisController();
        $this->favorite= new FavoriteController();
    }

    public function vehiculeInformations($id)
    {
        $vechinfo = $this->Vctl->getVehiculeById($id)[0];
    ?>
    <div class="MarqueInfos-container">
    <?php if (isset($_COOKIE['user'])) {
            $nbr = $this->favorite->getFavoriteByUV($id)[0]['nbr'] ; 
        ?>

            <div class='Fav' id='Fav'>
                <!-- <h3>Ajouter au Favorite</h3> -->
                <img id='FavImage' src=<?php if($nbr==0) { echo '/ComparateurVehicules/assets/Cstar' ;} else {echo '/ComparateurVehicules/assets/Ostar' ;} ?> width='50px'/>
            </div>
    <?php  } ?>
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

    public function AddAvis()
    {
    ?>  
    <div class='AddAvisSection'>
        <h5 class='titles'>Ajouter votre Avis </h5>
        <div class='Avis'>
            <div class='Note-container'>
                <h3>Note :</h3>
                <div class="container">
                    <div class="container__items">
                        <input type="radio" name="stars" id="st5" value=5>
                        <label for="st5">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Excellent"></div>
                        </label>
                        <input type="radio" name="stars" id="st4" value=4>
                        <label for="st4">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Good"></div>
                        </label>
                        <input type="radio" name="stars" id="st3" value=3>
                        <label for="st3">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="OK"></div>
                        </label>
                        <input type="radio" name="stars" id="st2" value=2>
                        <label for="st2">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Bad"></div>
                        </label>
                        <input type="radio" name="stars" id="st1" value=1>
                        <label for="st1">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        
                        </label>
                    </div>
                </div>
            </div>
            <div class='Comentaire'>
                <h3>Commentaire : </h3>
                <textarea  rows="6" cols="100" id='commentAvis'></textarea>
            </div>
            <button id="AddAvisBtn">Ajouter</button>
        </div>
       
        
    </div> 
    

    <?php
    }

    public function PopulaireComparations($id) 
    {
        $bestcomps = $this->Vctl->getPopulaireComparationsById($id) ;
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
        $id = isset($_GET["id"]) ? $_GET["id"] : -1;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->vehiculeInformations($id);
        $this->UserComponents->formComparation();
        $this->BestAvis($id);
        if (isset($_COOKIE['user'])) {
            $this->AddAvis();
        }

        $this->PopulaireComparations($id);
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
}
?>