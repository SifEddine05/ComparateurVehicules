<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/AdminComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');




class AvisAdminPage {
    private $AdminComponents ;


    public function __construct()
    {
        $this->AdminComponents = new AdminComponents();   
        $this->Markctl = new MarqueController(); 
        $this->avisctl = new AvisController();
    }

    public function ChoosePage()
   { 
    ?>
        <div class='GestionMarque'>
            <h5 class='titles'>Gestion des Avis</h5>
        </div>
   <?php
   }

   public function TableData()
   {
    $res = $this->avisctl->getAllAvisVehcicule();
    print_r($res);
    ?>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Utitlisateur</th>
                <th>Vehicule</th>
                <th>Commenataire</th>
                <th>Status</th>
                <th>Action</th>
                <th>Bloquer Utilisateur</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($res as $a)
                {
                    //<a class='AddBtn' href='/ComparateurVehicules/admin/AddMarques'>Ajouter </a> 
                ?>
                    <tr>
                        <td
                                
                        class='<?php echo ($a['Status'] != "accepted") ? "userNo" : ""; ?>'
'
                        > 
                            <?php echo $a['Prenom']." ". $a['Nom'] ; ?>
                        </td>
                        <td><?php echo $a['vechNom'] ?></td>
                        <td class="commenteCase"><?php echo $a['Commentaire'] ?></td>
                        <?php  if($a['Confirmer']==0) { 
                                        echo "<td class='enatt'> <span>En attente</span> </td>" ;}
                                    elseif($a['Confirmer']==1)
                                    {
                                        echo "<td class='confm'><span>Confirmer</span>  </td>";
                                    }
                                    else{
                                        echo "<td class='refus'> <span>Refuser</span> </td>";

                                    }
                            ?>

                        <?php if($a['Confirmer']==0)
                        {
                        ?>
                            <td><button class='AccepteAvisBton' value=<?php echo $a['AvisVehiculeId'] ?>>Accpter </button> | <button class='RefuseAvisBton' value=<?php echo $a['AvisVehiculeId'] ?>>Refuser </button></p></td>
                       <?php
                        }else if($a['Confirmer']==1)
                        {
                        ?>
                            <td><button class='RefuseAvisBton' value=<?php echo $a['AvisVehiculeId'] ?>>Supprimer </button> </p></td>
                        <?php
                        }
                        else{
                        ?>
                            <td><button class='AccepteAvisBton' value=<?php echo $a['AvisVehiculeId'] ?>>Accpter </button></td>
                        <?php
                        }
                        ?>
                        <td><button class='BloqueUserBton' value=<?php echo $a['UserId'] ?>>Bloquer </button></td>

                    </tr>
                <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Utitlisateur</th>
                <th>Vehicule</th>
                <th>Commenataire</th>
                <th>Status</th>
                <th>Action</th>
                <th>Bloquer Utilisateur</th>
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