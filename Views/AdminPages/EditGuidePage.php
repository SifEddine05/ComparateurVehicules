<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/GuideController.php');




class EditGuidePage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents(); 
        $this->guide =  new GuideController(); 
    }

    public function EditGuide($id)
   { 
    $guideinfo = $this->guide->getGuideById($id)[0];    
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier Un guide achat</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="titreEditGuide">Titre de guide <span>*</span></label>
                <input value="<?php echo $guideinfo['Titre'] ?>" type="text" id="titreEditGuide" name="titreEditGuide" required><br>

                <div class='ModifyImage'>
                    <div>
                        <label for="image">Ajouter l'image de la news <span>*</span></label>
                        <input type="file" id="image" name="image" accept="image/*" ><br>
                    </div>
                    <img src="<?php echo $guideinfo['image'] ?>" width='200px'/>
                </div>

                <input value=<?php echo $guideinfo['ImageId'] ?>  type="hidden" id="ImageId" name="ImageId" />
                <input value=<?php echo $guideinfo['GuideAchatId'] ?>  type="hidden" id="guideId" name="guideId" />

                
                <label for="Description">Description <span>*</span></label>
                <textarea id="Description" name="Description" required rows=3><?php echo $guideinfo['Description'] ?></textarea>


                <label for="Text">Text  <span>*</span></label>
                <textarea id="Text" name="Text" required rows=7><?php echo $guideinfo['Text'] ?></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
   <?php
   }
   

    public function getPage()
    {
        $id = $_GET['id'];

        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->EditGuide($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>