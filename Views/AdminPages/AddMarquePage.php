<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class AddMarquePage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
 
    }

    public function AddMarque()
   { 
    
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Ajouter Une  Marque</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="nomAddMarque">Nom de la marque <span>*</span></label>
                <input type="text" id="nomAddMarque" name="nomAddMarque" required><br>

                <label for="image">Ajouter le logo de la marque <span>*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required><br>

                <label for="paysOrigine">Pays d'Origine <span>*</span></label>
                <input type="text" id="paysOrigine" name="paysOrigine" required><br>

                <label for="siegSociale">Siège Social <span>*</span></label>
                <input type="text" id="siegSociale" name="siegSociale" required><br>

                <label for="anneeCreation">Année de Création <span>*</span></label>
                <input type="number" id="anneeCreation" name="anneeCreation" required><br>
                <div class='check-container'>
                    <label for="principale">Cette Marque Est Principale ? <span>*</span></label>
                    <input type="checkbox" id="principale" name="principale" value="1">
                </div>
                

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
            $this->AdminComponents->menu();
            $this->AddMarque();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>