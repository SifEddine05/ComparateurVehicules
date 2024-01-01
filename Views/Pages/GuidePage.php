<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/GuideController.php');




class GuidePage {
    private $UserComponents ;
    private $guide ;
   

    public function __construct()
    {
        $this->UserComponents = new UserComponents();   
        $this->guide = new GuideController(); 
    }

   public function Advices($offset,$records_per_page)
   {
    ?>
        <div class='guideSection'>
            <h5 class='titles'>Explorez les conseils qui vous aideront à acheter une voiture</h5>
            <?php $this->GuideCards($offset,$records_per_page) ?>
        </div>
    <?php
    }


    public function GuideCard($element)
        {
        ?>
            <div class="NewsCard">
                <div class="Title-container">
                    <img src="<?php echo $element['image'] ?>" width="300px" alt="news"/>
                    <h6><?php echo $element['Titre']  ?></h6>
                </div>
                <div class="NewsCardContent">
                    <p class="desciption"><?php echo $element['Description']  ?></p>
                    <div class="voirPlus">
                        <a href="/ComparateurVehicules/guide?id=<?php echo $element['GuideAchatId']  ?>" >Voir Plus </a>
                    </div>
                </div>
            </div>    
        <?php
        }


        public function Pagination($page,$records_per_page)
        {
            $nbr= $this->guide->getNbrGuides() ;
            $nbr=$nbr[0]['nbr'];
            $nbrPages=ceil($nbr/$records_per_page) ;
            $suiv =$page+1 ; 
            $prec=$page-1;
        ?>
        <div class="pagination-container">
            <nav aria-label="..." >
            <ul class="pagination">

                <li class="page-item <?php if($page==1) echo 'disabled' ?>">
                    <a class="page-link" href="/ComparateurVehicules/guideachat?page=<?php echo $prec ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                
                <?php 
                    for ($i = 1; $i <= $nbrPages; $i++) {
                        if($page==$i)
                        {
                        ?>
                            <li class="page-item active">
                                <a class="page-link" href="/ComparateurVehicules/guideachat?page=<?php echo $i ?>"><?php echo $i?></a>
                            </li>
                        <?php
                        }
                        else{
                            ?>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="/ComparateurVehicules/guideachat?page=<?php echo $i ?>"><?php echo $i?></a>
                            </li>
                        <?php
                        }
                    }
                ?>
                <li class="page-item <?php if($page==$nbrPages) echo 'disabled' ?>">
                    <a class="page-link" href="/ComparateurVehicules/guideachat?page=<?php echo $suiv ?>">Next</a>
                </li>
            </ul>
            </nav>
        </div>

       <?php
        }

        public function GuideCards($offset,$records_per_page)
        {
            $advices = $this->guide->getGuidesByPage($offset,$records_per_page);

        ?>
            <div class="News-container">
                <div class='Cards-container'>
                    <?php foreach($advices as $ad)
                        {
                            $this->GuideCard($ad) ;
                        }
                        ?>
                </div>
                    
            </div>
        
        <?php }


    public function getPage()
    {
        $records_per_page = 4;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $records_per_page;
        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->Advices($offset,$records_per_page);
        $this->Pagination($page,$records_per_page) ;
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}

?>