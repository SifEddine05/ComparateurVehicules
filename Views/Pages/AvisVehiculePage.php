<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');




class AvisVehiculePage {
    private $UserComponents ;
    private $Vctl ; 
    private $avisctl ;
   

    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->Vctl = new  VehiculeController();  
        $this->avisctl =  new AvisController();
    }

    public function vehiculeInformations($id)
    {
        $vechinfo = $this->Vctl->getVehiculeById($id)[0];
    ?>
    <div class="MarqueInfos-container">
            <h5 class='titles'>Les Avis de la vehivule</h5>
            <a class="MarqueInfos" href='/ComparateurVehicules/vehicule?id=<?php echo $id ?>'>
                <div class="MarqueNL">
                    <div class="MarqueName" id="VehiculeName">
                        <h4><?php echo $vechinfo['Nom'] ?></h4>
                    </div>
                    <div class="MarqueLogo" id="VehiculeImage">
                        <img src='<?php echo $vechinfo['image'] ?>' width="100%"/>
                    </div>
                </div>
            </a>
    </div>

    <?php
    }

    public function Avis($id,$offset,$records_per_page)
    { 
        $bestAvis = $this->avisctl->getAvisByPage($id,$offset,$records_per_page);
        $Len = count($bestAvis);
    ?>
        <div class='Best-Avis-Section'>
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

    public function Pagination($page,$records_per_page,$id)
    {
        $nbr= $this->avisctl->getNbrAvis($id) ;
        $nbr=$nbr[0]['Nbr'];
        $nbrPages=ceil($nbr/$records_per_page) ;
        $suiv =$page+1 ; 
        $prec=$page-1;
    ?>
    <div class="pagination-container">
        <nav aria-label="..." >
        <ul class="pagination">

            <li class="page-item <?php if($page==1) echo 'disabled' ?>">
                <a class="page-link" href="/ComparateurVehicules/avisVehicule?id=<?php echo $id ?>&page=<?php echo $prec ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <?php 
                for ($i = 1; $i <= $nbrPages; $i++) {
                    if($page==$i)
                    {
                    ?>
                        <li class="page-item active">
                            <a class="page-link" href="/ComparateurVehicules/avisVehicule?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i?></a>
                        </li>
                    <?php
                    }
                    else{
                        ?>
                        <li class="page-item " aria-current="page">
                            <a class="page-link" href="/ComparateurVehicules/avisVehicule?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i?></a>
                        </li>
                    <?php
                    }
                }
            ?>
            <li class="page-item <?php if($page==$nbrPages) echo 'disabled' ?>">
                <a class="page-link" href="/ComparateurVehicules/avisVehicule?id=<?php echo $id ?>&page=<?php echo $suiv ?>">Next</a>
            </li>
        </ul>
        </nav>
    </div>

   <?php
    }
   

    public function getPage()
    {
        $Id = isset($_GET["id"]) ? $_GET["id"] : -1;
        $records_per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $records_per_page;

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->vehiculeInformations($Id);
        $this->Avis($Id,$offset,$records_per_page);
        $this->Pagination($page,$records_per_page,$Id) ;
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}

//getAvisByPage($id,$offset,$records_per_page)