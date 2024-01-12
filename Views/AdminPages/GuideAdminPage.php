<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/GuideController.php');




class GuideAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->guidectl = new GuideController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion de Guide Achat</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->guidectl->getAllGuide();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Desciption</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($res as $n)
                {
                ?>
                    <tr>
                        <td class="commenteCase"><?php echo $n['Titre'] ?></td>
                        <td class="commenteCase"><div><?php echo $n['Description'] ?></div></td>
                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/params/editguide?id=<?php echo $n['GuideAchatId'] ?>'>Modifier </a> | <button class='DeleteGuideBton' value=<?php echo $n['GuideAchatId'] ?>>Supprimer </button></p></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Desciption</th>
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
            $this->AdminComponents->menu();
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