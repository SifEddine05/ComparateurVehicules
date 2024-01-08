<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');




class VehiculeAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->Vechctl = new VehiculeController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des vehicules</h5>
        </div>
   <?php
   }

   public function TableData($id)
   {
    $vehicules = $this->Vechctl->getAllVehiculeByMarqueId($id);
    ?>
    <table id="exampleVech" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Marque</th>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Version</th>
                <th>Année</th>
                <th>Action</th>
                <th>Lien Vers Vehicule</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($vehicules as $v)
                {
                    //<a class='AddBtn' href='/ComparateurVehicules/admin/AddMarques'>Ajouter </a> 
                ?>
                    <tr>
                        <td><?php echo $v['marque'] ?></td>
                        <td><?php echo $v['Nom'] ?></td>
                        <td><?php echo $v['Modele'] ?></td>
                        <td><?php echo $v['Version'] ?></td>
                        <td><?php echo $v['Annees'] ?></td>
                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/editvehicule?id=<?php echo $v['VehiculeId'] ?>'>Modifier </a> | <button class='DeleteVehiculeBton' value=<?php echo $v['VehiculeId'] ?> >Supprimer </button></p></td>
                        <td><a href='/ComparateurVehicules/vehicule?id=<?php echo $v['VehiculeId']?>'>Cliquer </a></td>
                    </tr>
                <?php
                }
            ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Marque</th>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Version</th>
                <th>Année</th>
                <th>Action</th>
                <th>Lien Vers Vehicule</th>

            </tr>
        </tfoot>
    </table>
<?php
   }
   

    public function getPage()
    {
        $id = $_GET['id'];

        if (isset($_COOKIE['admin'])) {
            $this->AdminComponents->Header();
            echo "<body>";
            $this->ChoosePage();
            $this->TableData($id);
            echo "</body> </html>";
        } else {
            header("Location: /ComparateurVehicules/admin/login"); 
            exit();
        }

       
    }
 
}

?>