<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');




class AddVehiculePage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->marquectl = new MarqueController();
 
    }

    public function AddVehicule()
   { 
    $marques =$this->marquectl->getAllMarques();
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Ajouter Une Vehicule</h5>
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">

                <label for="Marque">Marque <span>*</span></label>
                <Select id="Marque" name="Marque">
                    <?php
                        foreach($marques as $m)
                        {
                        ?>
                            <option value=<?php echo $m['MarqueId'] ?> ><?php echo $m['Nom'] ?></option>
                    <?php }
                    ?>

                </Select>
                <label for="nomAddVehicule">Nom de la vehicule <span>*</span></label>
                <input type="text" id="nomAddVehicule" name="nomAddVehicule" required><br>

                <label for="image">Ajouter l'image de la vehicule <span>*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required><br>

                <label for="Modele">Modèle <span>*</span></label>
                <input type="text" id="Modele" name="Modele" required><br>

                <label for="Version">Version <span>*</span></label>
                <input type="text" id="Version" name="siegSociale" required><br>

                <label for="Prix">Prix <span>*</span></label>
                <input type="number" id="Prix" name="Prix" required><br>
                
                <label for="Largeur">Largeur <span>*</span></label>
                <input type="number" id="Largeur" name="Largeur" required><br>
                
                <label for="Hauteur">Hauteur <span>*</span></label>
                <input type="number" id="Hauteur" name="Hauteur" required><br>
                
                <label for="Capacite">Capacité <span>*</span></label>
                <input type="number" id="Capacite" name="Capacite" required><br>
                
                <label for="VolCoffre">Volume de Coffre <span>*</span></label>
                <input type="number" id="VolCoffre" name="VolCoffre" required><br>
                
                <label for="Energie">Energie <span>*</span></label>
                <input type="text" id="Energie" name="Energie" required><br>
                
                <label for="Consommation">Consommation <span>*</span></label>
                <input type="text" id="Consommation" name="Consommation" required><br>
                
                <label for="BoiteVitesse">Boite de Vitesse <span>*</span></label>
                <input type="text" id="BoiteVitesse" name="BoiteVitesse" required><br>
                
                <label for="NbrVitesses">Nombre des vitesses <span>*</span></label>
                <input type="number" id="NbrVitesses" name="NbrVitesses" required><br>
                
                <label for="VitesseMax">Vitesse Maximale <span>*</span></label>
                <input type="number" id="VitesseMax" name="VitesseMax" required><br>
                
                <label for="Acceleration">Accélération <span>*</span></label>
                <input type="number" id="Acceleration" name="Acceleration" required><br>
                
                <label for="NbrCylindres">Nombre de Cylindres<span>*</span></label>
                <input type="number" id="NbrCylindres" name="NbrCylindres" required><br>
                
                <label for="NbrSouspapes">Nombre de soupapes par cylindre<span>*</span></label>
                <input type="number" id="NbrSouspapes" name="NbrSouspapes" required><br>
                
                <label for="Cylindree">Cylindrée<span>*</span></label>
                <input type="number" id="Cylindree" name="Cylindree" required><br>
                
                <label for="CoupleMoteur">Couple moteur<span>*</span></label>
                <input type="number" id="CoupleMoteur" name="CoupleMoteur" required><br>
                
                <label for="PuissanceFiscale">Puissance Fiscale<span>*</span></label>
                <input type="number" id="PuissanceFiscale" name="PuissanceFiscale" required><br>

                <input type="submit" value="Submit">
            </form>
        </div>
   <?php
   }
   

    public function getPage()
    {
        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->AddVehicule();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>