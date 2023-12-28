<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');




class AvisPage {
    private $UserComponents ;
   

    public function __construct()
    {
        $this->UserComponents = new UserComponents();    
    }

   

    public function getPage()
    {
        $Id = isset($_GET["id"]) ? $_GET["id"] : -1;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->UserComponents->principaleMarques(1);
        if($Id !=-1){
            $this->UserComponents->MarqueInformation($Id,1);
            $this->UserComponents->BestAvis($Id);
        }
        if (isset($_COOKIE['user']) and $Id !=-1) {
            $this->UserComponents->AddAvis();
        }
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}