<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');




class EditContactPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->contact = new ContactController();
    }

    public function EditContact($id)
   { 
        $res = $this->contact->getContactById($id)[0] ; 
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier Une Contact</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="EditNameContact">Name <span>*</span></label>
                <input value="<?php echo $res['Name'] ?>" type="text" id="EditNameContact" name="EditNameContact" required><br>
                <input value="<?php echo $res['ImageId'] ?>" type="hidden" id="ImageId" name="ImageId" required><br>
                <div class='ModifyImage'>
                    <div>
                        <label for="image">Modifier l'image de la contact <span>*</span></label>
                        <input type="file" id="image" name="image" accept="image/*" ><br>
                    </div>
                    <img src="<?php echo $res['image'] ?>" width='200px'/>
                </div>
                <input value="<?php echo $res['id'] ?>" type="hidden" id="id" name="id" required><br>

                <label for="Type">Type <span>*</span></label>
                <input value="<?php echo $res['type'] ?>" type="text" id="Type" name="Type" required><br>


                <label for="url">l'url de contact  <span>*</span></label>
                <input value="<?php echo $res['url'] ?>" type="url" id="url" name="url" required><br>

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
            $this->EditContact($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>