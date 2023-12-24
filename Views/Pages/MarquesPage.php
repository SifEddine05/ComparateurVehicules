<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class MarquePage {
    private $user ;
    private $UserComponents ;
    public function __construct()
    {
        $this->user = new UserController();
        $this->UserComponents = new UserComponents();
    }

    public function MarqueInformation()
    {?>
        <div class="MarqueInfos-container">
            <h5 class='titles'>Les Informations de la marque</h5>
            <div class="MarqueInfos">
                <div class="MarqueNL">
                    <div class="MarqueName">
                        <h4>Cherry</h4>
                    </div>
                    <div class="MarqueLogo">
                        <img src='/ComparateurVehicules/assets/Chery.png' width="100%"/>
                    </div>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Pays d'origine </p>
                    <p class='info'>Almenand</p>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Siège Social</p>
                    <p class='info'>Auerbach in der Oberpfalz, Allemagne</p>
                </div>
                <div class="Marqueinfo">
                    <p class='titl'>Année de création</p>
                    <p class='info'>1973</p>
                </div>
            </div>
            <div class='PrncipaleVehicules'>
                <h5 >Les vehicules principales</h5>
                <div class='listVechlsPrincipale'>
                    <a href='/ComparateurVehicules/vehicule?id=1'>
                        <img src='/ComparateurVehicules/assets/Tigo8.jpg' width="250px" />
                        <p>Chery Tiggo 8</p>
                    </a>
                    <a href='/ComparateurVehicules/vehicule?id=1'>
                        <img src='/ComparateurVehicules/assets/Tigo8.jpg' width="250px" />
                        <p>Chery Tiggo 8</p>
                    </a>
                    <a href='/ComparateurVehicules/vehicule?id=1'>
                        <img src='/ComparateurVehicules/assets/Tigo8.jpg' width="250px" />
                        <p>Chery Tiggo 8</p>
                    </a>
                    <a href='/ComparateurVehicules/vehicule?id=1'>
                        <img src='/ComparateurVehicules/assets/Tigo8.jpg' width="250px" />
                        <p>Chery Tiggo 8</p>
                    </a>
                </div>
            </div>
            <div class='List-Vehicule-Choose'>
                <h5 >Coisissez une voiture pour affichier ces spécifications :</h5>
                <div class='select-container'>
                    <select>
                        <option>Selectionner une vehicule</option>
                        <option>Vehicule 1</option>
                        <option>Vehicule 2</option>
                        <option>Vehicule 3</option>
                        <option>Vehicule 4</option>
                        <option>Vehicule 5</option>
                    </select>
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
        $this->UserComponents->principaleMarques();
        $this->MarqueInformation();
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}