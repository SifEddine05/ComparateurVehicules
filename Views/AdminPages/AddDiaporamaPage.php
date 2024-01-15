<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class AddDiaporamaPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
    }

    public function AddDiapo()
   { 
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Ajouter Une Diaporama</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="TypeAddDiapo">Type <span>*</span></label>
                <Select id="TypeAddDiapo" name="TypeAddDiapo">
                    <option value="news" >News</option>
                    <option value="pub" >Publicité</option>

                </Select>

                <label for="image">Ajouter l'image de la diaporama <span>*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required><br>


                <label for="url">l'url de diaporama  <span>*</span></label>
                <input type="text" id="url" name="url" required><br>

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
            $this->AddDiapo();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>