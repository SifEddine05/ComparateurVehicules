<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class ParamsAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->favorite= new FavoriteController();
 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='ChoosePageParams'>
            <div class='Params-choose-container'>
                <a href='/ComparateurVehicules/admin/params/guide' class='elem'><p>Gestion  de Guide d’achat</p></a>
                <a href='/ComparateurVehicules/admin/params/contact' class='elem' ><p>Gestion des Contacts</p></a>
                <a href='/ComparateurVehicules/admin/params/diaporama' class='elem' ><p>Gestion de Diaporama</p></a>
                
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