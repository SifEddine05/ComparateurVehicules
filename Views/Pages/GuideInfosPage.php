<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/GuideController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class GuideInfosPage {
    private $newsctl ; 
    private $UserComponents ;

    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->guide = new GuideController();
    }

    public function GuideDetails($id)
    {
        $res = $this->guide->getGuideById($id);
        $Info = $res[0] ;
    ?>
        <div class="NewsDetails">
            <h2 class="titles"><?php echo $Info['Titre'] ?></h2>
            <div class="Newscontent">
                <img src="<?php echo $Info['image'] ?>" />
                <p class="descrp"><?php echo $Info['Description'] ?></p>
                <p class="text"><?php echo $Info['Text'] ?></p>
            </div>
        </div>
    <?php
    }




    public function getPage()
        {
            $id = $_GET['id'];
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->GuideDetails($id);
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }


}