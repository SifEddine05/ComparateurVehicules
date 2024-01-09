<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/NewsController.php');




class NewsAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->newsctl = new NewsController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des News</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->newsctl->getAllNews();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Desciption</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($res as $n)
                {
                ?>
                    <tr>
                        <td class="commenteCase"><?php echo $n['titre'] ?></td>
                        <td class="commenteCase"><?php echo $n['description'] ?></td>
                        <td><?php echo $n['date_creation'] ?></td>
                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/editnews?id=<?php echo $n['NewsId'] ?>'>Modifier </a> | <button class='DeleteNewsBton' value=<?php echo $n['NewsId'] ?>>Supprimer </button></p></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Desciption</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
<?php
   }
   

    public function getPage()
    {
        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->ChoosePage();
            $this->TableData();
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>