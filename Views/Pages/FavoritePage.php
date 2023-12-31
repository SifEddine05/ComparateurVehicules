<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/FavoriteController.php');




class FavoritePage {
    private $UserComponents ;
    private $favorite ;


    public function __construct()
    {
        $this->UserComponents = new UserComponents();   
        $this->favorite= new FavoriteController();
 
    }

   public function FavorisVehicules()
   { 
     $favorites = $this->favorite->getFavoriteByU();
    ?>
        <div class='VechFavSection'>
            <h5 class='titles'>Vos véhicules favorisés</h5>
            <div class='Fav-container'>
                <?php
                    foreach($favorites as $fav)
                    {
                    ?>
                        <div>
                            <img src='<?php echo $fav['image'] ?>' width="100%" />
                            <img class="delImg" src='/ComparateurVehicules/assets/supprimer.png' width='40px' />
                            <p><a href='/ComparateurVehicules/vehicule?id=<?php echo $fav['VehiculeId'] ?>' ><?php echo $fav['Nom'] ?></a></p>
                        </div>
                    <?php
                    }
                ?>   
            </div>
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