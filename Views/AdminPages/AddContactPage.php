<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class AddContactPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
    }

    public function AddContact()
   { 
    
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Ajouter Une Contact</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="AddNameContact">Name <span>*</span></label>
                <input type="text" id="AddNameContact" name="AddNameContact" required><br>

                <label for="image">Ajouter l'image de la contact <span>*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required><br>

                <label for="Type">Type <span>*</span></label>
                <input type="text" id="Type" name="Type" required><br>


                <label for="url">l'url de contact  <span>*</span></label>
                <input type="url" id="url" name="url" required><br>

                <input type="submit" value="Submit">
            </form>
        </div>
   <?php
   }
   

    public function getPage()
    {
        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->AddContact();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>