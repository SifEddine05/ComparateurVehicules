<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');




class GuidePage {
    private $UserComponents ;
   

    public function __construct()
    {
        $this->UserComponents = new UserComponents();    
    }

   public function Advices()
   {
    ?>
        <div class='guideSection'>
            <h5 class='titles'>Explorez les conseils qui vous aideront à acheter une voiture</h5>
            <?php $this->NewsCards() ?>
        </div>
    <?php
    }


    public function NewsCard()
        {?>
            <div class="NewsCard">
                <div class="Title-container">
                    <img src="/ComparateurVehicules/assets/News1" width="300px" alt="news"/>
                    <h6>Sifou </h6>
                </div>
                <div class="NewsCardContent">
                    <p class="desciption">How are You ?</p>
                    <div class="voirPlus">
                        <a href="/ComparateurVehicules/newsdetails?id=5" >Voir Plus </a>
                    </div>
                </div>
            </div>    
        <?php
        }

        public function NewsCards()
        {

        ?>
            <div class="News-container">
                <div class="Cards-container">
                    <?php    $this->NewsCard() ; ?>
                    <?php    $this->NewsCard() ; ?>
                    <?php    $this->NewsCard() ; ?>
                    <?php    $this->NewsCard() ; ?>
                    <?php    $this->NewsCard() ; ?>
                    <?php    $this->NewsCard() ; ?>

                    
                </div>
            </div>
        
        <?php }


    public function getPage()
    {

        $this->UserComponents->Header();
        echo "<body>";
        $this->UserComponents->NavBar();
        $this->UserComponents->menu() ; 
        $this->Advices();
        $this->UserComponents->footer() ; 
        echo "</body> </html>";
    }
 
}

?>