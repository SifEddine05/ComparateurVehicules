<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class NewsPage {
        private $vehctl ; 
        private $UserComponents ;

        public function __construct()
        {
            $this->vehctl = new VehiculeController();
            $this->UserComponents = new UserComponents();
        }

        public function getPage()
        {
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
        
    }
?>