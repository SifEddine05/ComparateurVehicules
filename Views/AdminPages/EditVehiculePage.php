<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');




class EditVehiculePage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->marquectl = new MarqueController();
        $this->vctl = new VehiculeController();
 
    }

    public function EditVehicule($id)
   { 
    $marques =$this->marquectl->getAllMarques();

    $vehiculeInfos = $this->vctl->getVehiculeById($id)[0];
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier Une Vehicule</h5>
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <input value=<?php echo $id ?> type="hidden" id="VehiculeId" name="VehiculeId" required><br>

                <label for="Marque">Marque <span>*</span></label>
                <Select id="Marque" name="Marque">
                    <?php
                        foreach($marques as $m)
                        {
                        ?>
                            <option value=<?php echo $m['MarqueId'] ?> 
                                <?php if($vehiculeInfos['MarqueId']==$m['MarqueId']) { ?> selected <?php } ?>
                            >
                                <?php echo $m['Nom'] ?>
                            </option>
                    <?php }
                    ?>

                </Select>
                <input value=<?php echo $vehiculeInfos['MarqueId'] ?> type="hidden" id="MarqueId" name="MarqueId" required><br>


                <label for="nomEditVehicule">Nom de la vehicule <span>*</span></label>
                <input value="<?php echo $vehiculeInfos['Nom'] ?>" type="text" id="nomEditVehicule" name="nomEditVehicule" required><br>
                
                <input value=<?php echo $vehiculeInfos['ImageId'] ?> type="hidden" id="ImageId" name="ImageId" required><br>

                <div class='ModifyImage'>
                    <div>
                        <label for="image">Modifier l'image de vehicule </label>
                        <input type="file" id="image" name="image" accept="image/*"><br>
                    </div>
                    <img src="<?php echo $vehiculeInfos['image']?>" width='200px'/>

                </div>
                <input value=<?php echo $vehiculeInfos['ModeleId'] ?> type="hidden" id="ModeleId" name="ModeleId" required><br>

                <label for="Modele">Modèle <span>*</span></label>
                <input value="<?php echo $vehiculeInfos['modele'] ?>" type="text" id="Modele" name="Modele" required><br>

                <label for="Version">Version <span>*</span></label>
                <input  value="<?php echo $vehiculeInfos['Version'] ?>" type="text" id="Version" name="Version" required><br>

                <label for="Annee">Année <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Annees'] ?> type="number" id="Annee" name="Annee" required><br>

                <label for="Prix">Prix <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Prix'] ?> step="any" type="number" id="Prix" name="Prix" required><br>
                
                <input value=<?php echo $vehiculeInfos['DimensionsId'] ?> type="hidden" id="DimensionsId" name="DimensionsId" required><br>

                <label for="Largeur">Largeur <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Largeur'] ?> step="any" type="number" id="Largeur" name="Largeur" required><br>
                
                <label for="Hauteur">Hauteur <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Hauteur'] ?> step="any" type="number" id="Hauteur" name="Hauteur" required><br>
                
                <label for="NbrPlaces">Nombre de places <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['NombrePlaces'] ?> type="number" id="NbrPlaces" name="NbrPlaces" required><br>
                
                <label for="VolCoffre">Volume de Coffre <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['VolumeCoffre'] ?> step="any" type="number" id="VolCoffre" name="VolCoffre" required><br>
                
                <input value=<?php echo $vehiculeInfos['CaracteristiqueId'] ?> type="hidden" id="CaracteristiqueId" name="CaracteristiqueId" required><br>

                <label for="Energie">Energie <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Energie'] ?> type="text" id="Energie" name="Energie" required><br>
                
                <label for="Consommation">Consommation <span>*</span></label>
                <input value="<?php echo $vehiculeInfos['Consommation'] ?>" type="text" id="Consommation" name="Consommation" required><br>
                
                <label for="BoiteVitesse">Boite de Vitesse <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Boite'] ?> type="text" id="BoiteVitesse" name="BoiteVitesse" required><br>
                
                <label for="NbrVitesses">Nombre des vitesses <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['NbVitesses'] ?> type="number" id="NbrVitesses" name="NbrVitesses" required><br>
                
                <input value=<?php echo $vehiculeInfos['PerformancesId'] ?> type="hidden" id="PerformancesId" name="PerformancesId" required><br>

                <label for="VitesseMax">Vitesse Maximale <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['VitesseMaximum'] ?> step="any" type="number" id="VitesseMax" name="VitesseMax" required><br>
                
                <label for="Acceleration">Accélération <span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Acceleration'] ?> step="any" type="number" id="Acceleration" name="Acceleration" required><br>
                
                <input value=<?php echo $vehiculeInfos['MoteurId'] ?> type="hidden" id="MoteurId" name="MoteurId" required><br>

                <label for="NbrCylindres">Nombre de Cylindres<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['NombreCylindres'] ?> type="number" id="NbrCylindres" name="NbrCylindres" required><br>
                
                <label for="NbrSouspapes">Nombre de soupapes par cylindre<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['NombreSoupapesParCylindre'] ?> type="number" id="NbrSouspapes" name="NbrSouspapes" required><br>
                
                <label for="Cylindree">Cylindrée<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['Cylindree'] ?> step="any" type="number" id="Cylindree" name="Cylindree" required><br>
                
                <label for="PuissanceDIN">Puissance DIN<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['PuissanceDIN'] ?> step="any" type="number" id="PuissanceDIN" name="PuissanceDIN" required><br>

                <label for="CoupleMoteur">Couple moteur<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['CoupleMoteur'] ?> step="any" type="number" id="CoupleMoteur" name="CoupleMoteur" required><br>
                
                <label for="PuissanceFiscale">Puissance Fiscale<span>*</span></label>
                <input value=<?php echo $vehiculeInfos['PuissanceFiscale'] ?> step="any" type="number" id="PuissanceFiscale" name="PuissanceFiscale" required><br>

                <input type="submit" value="Submit">
            </form>
        </div>
   <?php
   }
   

    public function getPage()
    {
        $id = $_GET['id'];

        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->AdminComponents->menu();
            $this->EditVehicule($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>