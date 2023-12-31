<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');




class FavoritePage {
    private $UserComponents ;
   

    public function __construct()
    {
        $this->UserComponents = new UserComponents();    
    }

   public function FavorisVehicules()
   { ?>
        <div class='VechFavSection'>
            <h5 class='titles'>Vos véhicules favorisés</h5>
        </div>
   <?php
   }

    public function getPage()
    {
        $Id = isset($_GET["id"]) ? $_GET["id"] : -1;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->FavorisVehicules();
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}

?>