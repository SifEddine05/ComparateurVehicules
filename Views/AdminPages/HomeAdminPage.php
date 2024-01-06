<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class HomeAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->favorite= new FavoriteController();
 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='ChoosePageAdmin'>
            <h5 class='titles'>Choisissez une catégorie</h5>
            <div class='Pages-choose-container'>
                <a href='/ComparateurVehicules/admin/marques' class='elem' style="background-image: url('/ComparateurVehicules/assets/VehiculeAdmin.jpg'); background-size: cover;   background-position: center;"><p>Gestion des Vehicules</p></a>
                <a href='/ComparateurVehicules/admin/avis' class='elem' style="background-image: url('/ComparateurVehicules/assets/AvisAdmin.jpg'); background-size: cover;   background-position: center;"><p>Gestion des Avis</p></a>
                <a href='/ComparateurVehicules/admin/news' class='elem' style="background-image: url('/ComparateurVehicules/assets/NewsAdmin.jpg'); background-size: cover;   background-position: center;"><p>Gestion des News</p></a>
                <a href='/ComparateurVehicules/admin/users' class='elem' style="background-image: url('/ComparateurVehicules/assets/userAdmin.jpg'); background-size: cover;   background-position: center;"><p>Gestion des Utilisateurs</p></a>
                <a href='/ComparateurVehicules/admin/params' class='elem' style="background-image: url('/ComparateurVehicules/assets/settingAdmin.jpg'); background-size: cover;   background-position: center;"><p>Gestion des Paramètres</p></a>

            </div>
        </div>
   <?php
   }
   

    public function getPage()
    {
        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->ChoosePage();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>