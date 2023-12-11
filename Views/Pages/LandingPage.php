<?php 
require_once("Views/Components/UserComponents.php");
    class LandingPage {
        private $UserComponents ;

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
        }
         
        public function getLandingPage()
        {
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->Diaporama() ; 
            $this->UserComponents->menu() ; 

            echo "</body> </html>";
        }
    }

?>