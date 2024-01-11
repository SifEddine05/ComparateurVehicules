<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/DiaporamaController.php');




class EditDiaporamaPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();  
        $this->diapo = new DiaporamaController();
 
    }

    public function EditDiapo($id)
   { 
    $res = $this->diapo->getDiapoById($id)[0];
    // `IdImage`, `UrlPublicite`, `Type`
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier Une Diaporama</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="TypeEditDiapo">Type <span>*</span></label>
                <Select id="TypeEditDiapo" name="TypeEditDiapo">
                    <option value="news" <?php if($res['Type']=="news") { ?> selected <?php } ?> >
                        News
                    </option>
                    <option value="pub" <?php if($res['Type']=="pub") { ?> selected <?php } ?> >
                        Publicité
                    </option>
                    
                </Select>

                <input value="<?php echo $res['IdImage'] ?>" type="hidden" id="ImageId" name="ImageId" required><br>
                <div class='ModifyImage'>
                    <div>
                        <label for="image">Modifier l'image de la diaporama <span>*</span></label>
                        <input type="file" id="image" name="image" accept="image/*" ><br>
                    </div>
                    <img src="<?php echo $res['image'] ?>" width='200px'/>
                </div>
                <input value="<?php echo $res['DiaporamaId'] ?>"  type="hidden" id="DiaporamaId" name="DiaporamaId" required><br>


                <label for="url">l'url de diaporama  <span>*</span></label>
                <input value="<?php echo $res['UrlPublicite'] ?>" type="text" id="url" name="url" required><br>

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
            $this->EditDiapo($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>