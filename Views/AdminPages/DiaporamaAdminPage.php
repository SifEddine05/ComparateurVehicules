<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/DiaporamaController.php');




class DiaporamaAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->diaporamactl = new DiaporamaController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des Diaporama</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->diaporamactl->getDiaporama();
    print_r($res) ;
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Type</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($res as $n)
                {
                ?>
                    <tr>
                        <td ><?php echo $n['Type'] ?></td>
                        <td ><div><?php echo $n['url'] ?></div></td>

                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/params/editdiaporama?id=<?php echo $n['DiaporamaId'] ?>'>Modifier </a> | <button class='DeleteContactBton' value=<?php echo $n['DiaporamaId'] ?>>Supprimer </button></p></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Type</th>
                <th>Name</th>
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