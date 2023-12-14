<?php 
require_once("Views/Components/UserComponents.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');

    class ComparatorPage {
        private $UserComponents ;
        private $vehctl ; 

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
            $this->vehctl = new VehiculeController();

        }


        public function comparationTable($id1,$id2,$id3,$id4){
            $res1 = $this->vehctl->getVehiculeById($id1);
            print_r($res1);
       ?>
            <div class="ComaparasionTable">
                <h5 class="titles">Le resultat de comparison </h5>
                <table>
                    <thead>
                        <tr>
                            <th>Caractéristiques</th>
                            <th>Vehicule 1</th>
                            <th>Vehicule 2</th>
                            <?php 
                                if ($id3 != -1) {
                                    echo '<th>Vehicule 3</th>';
                                }
                                if ($id4 != -1) {
                                    echo '<th>Vehicule 4</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                        </tr>

                    </tbody>
                </table>

            </div>
        <?php
        }
         
        public function getPage()
        {
            $V1Id = isset($_GET["V1"]) ? $_GET["V1"] : -1;
            $V2Id = isset($_GET["V2"]) ? $_GET["V2"] : -1;
            $V3Id = isset($_GET["V3"]) ? $_GET["V3"] : -1;
            $V4Id = isset($_GET["V4"]) ? $_GET["V4"] : -1;


            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->UserComponents->formComparation();
            if($V1Id!=-1 & $V2Id!=-1)
            {
                $this->comparationTable($V1Id,$V2Id,$V3Id,$V4Id);
            }
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
    }

?>