<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');




class MarqueAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->Markctl = new MarqueController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des marques</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->Markctl->getAllMarquesInformations();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Marque</th>
                <th>Pays d'origine</th>
                <th>Siège Sociale</th>
                <th>Année de création</th>
                <th>Action</th>
                <th>Les Vehicules</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($res as $m)
                {
                    //<a class='AddBtn' href='/ComparateurVehicules/admin/AddMarques'>Ajouter </a> 
                ?>
                    <tr>
                        <td><?php echo $m['Nom'] ?></td>
                        <td><?php echo $m['PaysOrigine'] ?></td>
                        <td><?php echo $m['SiegeSociale'] ?></td>
                        <td><?php echo $m['AnneeCreation'] ?></td>
                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/editmarque?id=<?php echo $m['MarqueId'] ?>'>Modifier </a> | <button class='DeleteMarqueBton' value=<?php echo $m['MarqueId'] ?>>Supprimer </button></p></td>
                        <td><a href='/ComparateurVehicules/admin/vehicules?id=<?php echo $m['MarqueId']?>'>Cliquer pour la gestion des vehicules </a></td>

                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Marque</th>
                <th>Pays d'origine</th>
                <th>Siège Sociale</th>
                <th>Année de création</th>
                <th>Action</th>
                <th>Les Vehicules</th>
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