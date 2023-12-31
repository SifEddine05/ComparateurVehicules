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
     $arrayLength = count($favorites);

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
                            <button value=<?php echo $fav['VehiculeId']  ?> class="delImg"><img   src='/ComparateurVehicules/assets/supprimer.png' width='40px' /></button>
                            <p><a href='/ComparateurVehicules/vehicule?id=<?php echo $fav['VehiculeId'] ?>' ><?php echo $fav['Nom'] ?></a></p>
                        </div>
                    <?php
                    }
                    
                ?>   
            </div>
            <?php if($arrayLength==0)
                    {
                        echo "<h4 class='error'>Il n'y a pas de favoris </h4>";
                    }
            ?>
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