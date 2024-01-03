<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class HomeAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->favorite= new FavoriteController();
 
    }

    
   

    public function getPage()
    {
        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            echo "<div>Sifou</div>";
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>