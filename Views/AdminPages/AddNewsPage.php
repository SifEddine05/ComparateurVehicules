<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');




class AddNewsPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
    }

    public function AddNews()
   { 
    
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Ajouter Une  News</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="titreAddNews">Titre de News <span>*</span></label>
                <input type="text" id="titreAddNews" name="titreAddNews" required><br>

                <label for="image">Ajouter l'image de la news <span>*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required><br>

                <label for="Description">Description <span>*</span></label>
                <textarea id="Description" name="Description" required rows=3></textarea>


                <label for="Text">Text  <span>*</span></label>
                <textarea id="Text" name="Text" required rows=7></textarea>
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
            $this->AddNews();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>