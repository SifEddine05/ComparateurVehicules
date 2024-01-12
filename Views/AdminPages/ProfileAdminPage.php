<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/FavoriteController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/UserController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');




class ProfileAdminPage {
    private $UserComponents ;
    private $favorite ;


    public function __construct()
    {
        $this->UserComponents = new UserComponents();   
        $this->favorite= new FavoriteController();
        $this->userctl = new UserController();
        $this->avisctl = new AvisController();
 
    }
    public function UserInformations($id)
    {
        $userinfos = $this->userctl->getUserById($id);
    ?>
    <div class="MarqueInfos-container">
            <h5 class='titles'>Les Informations de l'utilisateur</h5>
            <div class="MarqueInfos">
                <div class="MarqueNL" id="UserAvatar-container">
                    <div class="MarqueName" id="VehiculeName">
                        <h4><?php echo $userinfos['Nom']."  ".$userinfos['Prenom'] ?></h4>
                    </div>
                    <div class="MarqueLogo" id="AvatarUser">
                        <img src='/ComparateurVehicules/assets/Avatar.png' width="110px"/>
                    </div>
                </div> 

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Sexe</p>
                    <p class='info'><?php echo $userinfos['Sexe'] ?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Date de Naissance</p>
                    <p class='info'><?php echo $userinfos['DateDeNaissance'] ?></p>
                </div>

                <div class="Marqueinfo Vhinfo1">
                    <p class='titl'>Email</p>
                    <p class='info'><?php echo $userinfos['email'] ?></p>
                </div>
            </div>  

                
        <!-- </div> -->
            
    </div>

    <?php
    }
    public function Avis($id,$offset,$records_per_page)
    { 
        $bestAvis = $this->avisctl->getAvisUserByPage($id,$offset,$records_per_page);
        $Len = count($bestAvis);
    ?>
        <div class='Best-Avis-Section'>
            <h3 class='titles'>Les Avis de l'utilisateur</h3>
            <?php 
            if($bestAvis)
            {
            ?>
            <div class='BestAvis-container'>

            <?php 
                foreach($bestAvis as $b)
                {
                ?>
                    <div class='Avis-Container'>
                        <div class='Avis'>
                            <img src='/ComparateurVehicules/assets/Comment.png' alt='comment' />
                            <h6><?php echo $b['Commentaire'] ?></h6>
                            <p>Note : <?php echo $b['Note'] ?>/5⭐</p>
                        </div>
                        <h3> <span>👤</span> <?php echo $b['Nom'].' '.$b['Prenom'] ?></h3>
                    </div>
            <?php
                }
            ?>
            </div>
            <?php
            }else {
                echo "<h3 style='color:red'>il n'y a pas d'avis pour cette vethicule</h3>" ;
            }
            ?>

        </div>
    <?php
    } 
   public function FavorisVehicules($userId)
   { 
     $favorites = $this->favorite->getFavoriteByU($userId);
     $arrayLength = count($favorites);

    ?>
        <div class='VechFavSection'>
            <h5 class='titles'>les véhicules favorisés</h5>
            <div class='Fav-container'>
                <?php
                    foreach($favorites as $fav)
                    {
                    ?>
                        <div>
                            <img src='<?php echo $fav['image'] ?>' width="100%" />
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

   public function Pagination($page,$records_per_page,$id)
    {
        $nbr= $this->avisctl->getNbrAvisUser($id) ;
        $nbr=$nbr[0]['Nbr'];
        $nbrPages=ceil($nbr/$records_per_page) ;
        $suiv =$page+1 ; 
        $prec=$page-1;
    ?>
    <div class="pagination-container">
        <nav aria-label="..." >
        <ul class="pagination">

            <li class="page-item <?php if($page==1) echo 'disabled' ?>">
                <a class="page-link" href="/ComparateurVehicules/admin/profile?id=<?php echo $id ?>&page=<?php echo $prec ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <?php 
                for ($i = 1; $i <= $nbrPages; $i++) {
                    if($page==$i)
                    {
                    ?>
                        <li class="page-item active">
                            <a class="page-link" href="/ComparateurVehicules/admin/profile?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i?></a>
                        </li>
                    <?php
                    }
                    else{
                        ?>
                        <li class="page-item " aria-current="page">
                            <a class="page-link" href="/ComparateurVehicules/admin/profile?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i?></a>
                        </li>
                    <?php
                    }
                }
            ?>
            <li class="page-item <?php if($page==$nbrPages) echo 'disabled' ?>">
                <a class="page-link" href="/ComparateurVehicules/admin/profile?id=<?php echo $id ?>&page=<?php echo $suiv ?>">Next</a>
            </li>
        </ul>
        </nav>
    </div>

   <?php
    }
    public function getPage()
    {
        $userId = isset($_GET["id"]) ? $_GET["id"] : -1;

        $records_per_page = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $records_per_page;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->menu() ; 
        $this->UserInformations($userId);
        $this->FavorisVehicules($userId);
        $this->Avis($userId,$offset,$records_per_page);
        $this->Pagination($page,$records_per_page,$userId) ;        
        echo "</body> </html>";
    }
 
}

?>