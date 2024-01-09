<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/UserController.php');




class UserAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->userctl = new UserController(); 
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des Utilisateurs</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->userctl->getAllUsers();
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
                <th>Voir Profile</th>
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
                        <td><?php echo $m['Prenom'] ?></td>
                        <td><?php echo $m['Sexe'] ?></td>
                        <td><?php echo $m['DateDeNaissance'] ?></td>
                        <td><?php echo $m['email'] ?></td>

                        <td
                            class='<?php  if($m['Status'] == "accepted") echo "confm" ;
                                          elseif($m['Status']=="pending") echo "enatt";
                                          else echo "refus" ;


                            ; ?>'
                        ><?php echo $m['Status'] ?></td>
                        <?php if($m['Status']=="pending")
                        {
                        ?>
                            <td><button class='AccepteUserBton' value=<?php echo $m['UserId'] ?>>Accpter </button> | <button class='BloqueUserBton' value=<?php echo $m['UserId'] ?>>Refuser </button></p></td>
                       <?php
                        }else if($m['Status']=="accepted")
                        {
                        ?>
                            <td><button class='BloqueUserBton' value=<?php echo $m['UserId'] ?>>Bloquer </button> </p></td>
                        <?php
                        }
                        else{
                        ?>
                            <td><button class='AccepteUserBton' value=<?php echo $m['UserId'] ?>>Debloquer </button></td>
                        <?php
                        }
                        ?>              
                        <td><a href='/ComparateurVehicules/admin/profile?id=<?php echo $m['UserId']?>'>Cliquer pour voir le profile </a></td>

                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
                <th>Voir Profile</th>
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