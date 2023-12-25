<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Pages/ComparatorPage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');



class MarquePage {
    private $compar ;
    private $UserComponents ;
    private $vehctl ;
    private $marque ; 
    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->compar = new ComparatorPage();
        $this->vehctl = new VehiculeController();
        $this->marque = new MarqueController() ;
        
    }

    public function MarqueInformation()
    {
        $marqueInfo = $this->marque->getMarqueById(1)[0];
        $principaleVehc= $this->marque->getPrincipaleVehicules(1);
        $Allvehicules = $this->marque->getAllVehicules(1);
    ?>
        <div class="MarqueInfos-container">
            <h5 class='titles'>Les Informations de la marque</h5>
            <div class="MarqueInfos">
                <div class="MarqueNL">
                    <div class="MarqueName">
                        <h4><?php echo $marqueInfo['Nom'] ?></h4>
                    </div>
                    <div class="MarqueLogo">
                        <img src='<?php echo $marqueInfo['logo'] ?>' width="100%"/>
                    </div>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Pays d'origine </p>
                    <p class='info'><?php echo $marqueInfo['PaysOrigine'] ?></p>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Siège Social</p>
                    <p class='info'><?php echo $marqueInfo['SiegeSociale'] ?></p>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Année de création</p>
                    <p class='info'><?php echo $marqueInfo['AnneeCreation'] ?></p>
                </div>
            </div>
            <div class='PrncipaleVehicules'>
                <h5 >Les vehicules principales</h5>
                <div class='listVechlsPrincipale'>
                    <?php 
                    foreach($principaleVehc as $vech)
                    {
                    ?>
                        <a href='/ComparateurVehicules/vehicule?id=<?php echo $vech['VehiculeId'] ?>'>
                            <img src='<?php echo $vech['image'] ?>' width="250px" />
                            <p><?php echo  $vech['Nom'] ?></p>
                        </a>
                    <?php
                    }
                   ?>
                </div>
            </div>
            <div class='List-Vehicule-Choose'>
                <h5 >Coisissez une voiture pour affichier ces spécifications :</h5>
                <div class='select-container'>
                    <select name='VehiculeInfoSelect'>
                        <option value='None'>Selectionner une vehicule</option>
                        <?php 
                            foreach($Allvehicules as $veh)
                            {
                            ?>
                                <option value='<?php echo $veh['VehiculeId']?>'><?php echo $veh['Nom'] ?></option>

                        <?php
                            }
                        ?>
                    </select>
                </div>
                
            </div>
        </div>
    <?php
    }

    public function createLigne($titile,$res1,$unit,$elem,$class)
    {
    ?>
        <tr >
            <th class="<?php echo $class?>"  ><h4><?php echo $titile?></h4></th>
            <td><h4><?php echo $res1[0][$elem]?> <?php echo $unit ?></h4></td>
        </tr> 

    <?php
    }
    public function VehiculeInformations()
    { 
        $res1 = $this->vehctl->getVehiculeById(7);
    ?>
    <div class="vehiculeinfo">
        <div class="table-container" id="table-vch-marque">
                    <table >
                        <thead>
                            <tr>
                                <th style="background-color:#4E4FEB" ><h4>Caractéristiques</h4></th>
                                <th class="header"><h4><?php echo $res1[0]['Nom'] ?></h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <th class="principlae-carc"><h4>Image de Vehicule</h4></th>
                                <td>
                                    <a href='/ComparateurVehicules/Vehicule?id=<?php echo $res1[0]['VehiculeId']?>'  >
                                        <img src="<?php echo $res1[0]['image'] ?>" width="350px" alt="vehicule1" />
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                $this->createLigne('Marque',$res1,'','marque','principlae-carc');
                                $this->createLigne('Modèle',$res1,'','modele','principlae-carc');
                                $this->createLigne('Version',$res1,'','Version','principlae-carc');
                                $this->createLigne('Année',$res1,'','Annees','principlae-carc');
                                $this->createLigne('Prix',$res1,'$','Prix','principlae-carc');
                            ?> 
                            <tr >
                                <th colspan=5 style="background-color:#4E4FEB" ><h4 id="dimbtn">Dimensions </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Largeur',$res1,'m','Largeur','sub-headers');
                                $this->createLigne('Hauteur',$res1,'m','Hauteur','sub-headers');
                                $this->createLigne('Capacité',$res1,' places','NombrePlaces','sub-headers');
                                $this->createLigne('Volume de Coffre',$res1,'litres','VolumeCoffre','sub-headers');
                            ?>    
                           
                            <tr >
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimcarc">Caractéristiques </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Energie',$res1,'','Energie','sub-headers');
                                $this->createLigne('Consommation',$res1,'','Consommation','sub-headers');
                                $this->createLigne('Boite de Vitesse',$res1,'','Boite','sub-headers');
                                $this->createLigne('Nombre des Vitesses',$res1,'','NbVitesses','sub-headers');
                            ?> 
                            <tr>
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimperf">Performances </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Vitesse Maximale',$res1,'km/h','VitesseMaximum','sub-headers');
                                $this->createLigne('Accélération',$res1,'s','Acceleration','sub-headers');
                            ?> 
                            <tr>
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimmotr">Moteur</h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Nombre de Cylindres',$res1,'','NombreCylindres','sub-headers');
                                $this->createLigne('Nombre de soupapes par cylindre',$res1,'','NombreSoupapesParCylindre','sub-headers');
                                $this->createLigne('Cylindrée	',$res1,'L','Cylindree','sub-headers');
                                $this->createLigne('Puissance DIN',$res1,'Ch','PuissanceDIN','sub-headers');
                                $this->createLigne('Couple moteur',$res1,'Nm','CoupleMoteur','sub-headers');
                                $this->createLigne('Couple moteur',$res1,'Nm','CoupleMoteur','sub-headers');
                                $this->createLigne('Puissance Fiscale',$res1,'Cv','PuissanceFiscale','sub-headers');


                            ?> 
                        
                        </tbody>
                    </table>
        </div>
    </div>
    <?php
    }


    public function getPage()
    {
        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->UserComponents->principaleMarques();
        $this->MarqueInformation();
        $this->VehiculeInformations();
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}