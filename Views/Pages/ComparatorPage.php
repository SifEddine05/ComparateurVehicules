<?php 
require_once("Views/Components/UserComponents.php");
    class ComparatorPage {
        private $UserComponents ;

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
        }


        public function comparationTable(){

        }
         
        public function getPage()
        {
            $V1Id = $_GET["V1"];
            $V2Id = $_GET["V2"];

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