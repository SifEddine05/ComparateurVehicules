<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MessagesController.php');




class MessagesAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->contactctl = new ContactController();
        $this->msgctl = new  MessageController();
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Les Messages Des utilisateurs</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $messages = $this->msgctl->getAllmessages();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Expéditeur</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date d'envoie</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($messages as $m)
                {
                ?>
                    <tr>
                        <td ><?php echo $m['sender'] ?></td>
                        <td ><div><?php echo $m['email'] ?></div></td>
                        <td class="commenteCase"><div><?php echo $m['message'] ?></div></td>
                        <td ><div><?php echo $m['datePublish'] ?></div></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Expéditeur</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date d'envoie</th>
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