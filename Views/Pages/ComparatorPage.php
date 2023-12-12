<?php 
require_once("Views/Components/UserComponents.php");
    class ComparatorPage {
        private $UserComponents ;

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
        }
         
        public function getPage()
        {
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->UserComponents->formComparation();
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
    }

?>