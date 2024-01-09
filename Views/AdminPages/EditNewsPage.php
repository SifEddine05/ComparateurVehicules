<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/NewsController.php');




class EditNewsPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->newsctl = new NewsController();
    }

    public function EditNews($id)
   { 
        $news = $this->newsctl->getNewsById($id)[0]; 
    ?>
        <div class='AddMarqueForm'>
            <h5 class='titles'>Modifier Une  News</h5>
            
            <form action="/ComparateurVehicules/api/apiRoutes.php" method="post" enctype="multipart/form-data">
                <label for="titreEditNews">Titre de News <span>*</span></label>
                <input value="<?php echo $news['titre']?>" type="text" id="titreEditNews" name="titreEditNews" required><br>

                <div class='ModifyImage'>
                    <div>
                        <label for="image">Ajouter l'image de la news <span>*</span></label>
                        <input type="file" id="image" name="image" accept="image/*" ><br>
                    </div>
                    <img src="<?php echo $news['image']?>" width='200px'/>

                </div>
                
                <input type="hidden" id="NewsId" name="NewsId" value=<?php echo $news['NewsId'] ?> />
                <input type="hidden" id="ImageId" name="ImageId" value=<?php echo $news['ImageId'] ?> />

                <label for="Description">Description <span>*</span></label>
                <textarea  id="Description" name="Description" required rows=3><?php echo $news['description']?></textarea>

                <label for="Text">Text  <span>*</span></label>
                <textarea id="Text" name="Text" required rows=7><?php echo $news['Text']?></textarea>
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
            $this->EditNews($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>