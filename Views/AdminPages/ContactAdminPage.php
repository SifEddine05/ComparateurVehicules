<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');




class ContactAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->contactctl = new ContactController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des Contacts</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->contactctl->getContacts();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
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
                        <td ><?php echo $n['type'] ?></td>
                        <td ><div><?php echo $n['Name'] ?></div></td>
                        <td ><div><?php echo $n['url'] ?></div></td>

                        <td><a class='EditBtn' href='/ComparateurVehicules/admin/params/editcontact?id=<?php echo $n['id'] ?>'>Modifier </a> | <button class='DeleteContactBton' value=<?php echo $n['id'] ?>>Supprimer </button></p></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Url</th>
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