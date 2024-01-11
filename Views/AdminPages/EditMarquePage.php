<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');




class EditMarquePage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->marquectl = new MarqueController();
    }

    public function EditMarque($id)
   { 
    $marqueInfo = $this->marquectl->getMarqueById(8)[0];
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier  Marque</h5>
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="nomEditMarque">Nom de la marque <span>*</span></label>
                <input  type="text" id="nomEditMarque" name="nomEditMarque" value=<?php echo $marqueInfo['Nom'] ?>  required><br>

                <input type="hidden"  name="editMarqueId" id="editMarqueId" value=<?php echo $marqueInfo['MarqueId'] ?> />
                <div class='ModifyImage'>
                    <div>
                        <label for="image">Modifier le logo de la marque </label>
                        <input type="file" id="image" name="image" accept="image/*"><br>
                    </div>
                    <img src="<?php echo $marqueInfo['logo']?>" width='150px'/>

                </div>

                <label for="paysOrigine">Pays d'Origine <span>*</span></label>
                <input type="text" id="paysOrigine" name="paysOrigine" value="<?= $marqueInfo['PaysOrigine'] ?>" required><br>

                <label for="siegSociale">Siège Social <span>*</span></label>
                <input type="text" id="siegSociale" name="siegSociale"value="<?php echo $marqueInfo['SiegeSociale'] ?>" required><br>

                <label for="anneeCreation">Année de Création <span>*</span></label>
                <input type="number" id="anneeCreation" name="anneeCreation" value=<?php echo $marqueInfo['AnneeCreation'] ?> required><br>
                <div class='check-container'>
                    <label for="principale">Cette Marque Est Principale ? <span>*</span></label>
                    <input type="checkbox" id="principale" name="principale" value="1" 
                        <?php if($marqueInfo['Principale']==0) {?>unchecked 
                        <?php }else {?>
                            checked
                       <?php }
                       ?>
                        
                        >
                </div>
                

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
            $this->AdminComponents->menu();
            $this->EditMarque($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>