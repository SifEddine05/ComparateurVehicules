<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');

class VehiculePage {
    private $UserComponents ;
    private $Vctl ;
    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->Vctl = new VehiculeController();
    }

    public function vehiculeInformations()
    {
        $vechinfo = $this->Vctl->getVehiculeById(7)[0];
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
        $this->vehiculeInformations();
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
}
?>