<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ComparateurVehicules/Views/Components/UserComponents.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');

    class ComparatorPage {
        private $UserComponents ;
        private $vehctl ; 

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
            $this->vehctl = new VehiculeController();

        }

        public function createLigne($titile,$res1,$res2,$res3,$res4,$unit,$elem,$class)
        {
        ?>
            <tr >
                <th class="<?php echo $class?>"  ><h4><?php echo $titile?></h4></th>
                <td><h4><?php echo $res1[0][$elem]?> <?php echo $unit ?></h4></td>
                <td><h4><?php echo $res2[0][$elem]?>  <?php echo $unit ?></h4></td>
                <?php if($res3!=-1)
                {
                ?>
                    <td><h4><?php echo $res3[0][$elem]?>  <?php echo $unit ?></h4></td>
                <?php
                }
                ?>
                    <?php if($res4!=-1)
                {
                ?>
                    <td><h4><?php echo $res4[0][$elem]?>  <?php echo $unit ?></h4></td>
                <?php
                }
                ?>
            </tr> 
   
        <?php
        }


        public function comparationTable($id1,$id2,$id3,$id4){
            $res1 = $this->vehctl->getVehiculeById($id1);
            $res2 = $this->vehctl->getVehiculeById($id2);
            if($id3!=-1){
                $res3 = $this->vehctl->getVehiculeById($id3);
                
            }
            else {
                $res3 = -1;
            }
            if($id4!=-1)
            {
                $res4 = $this->vehctl->getVehiculeById($id4);
            }
            
            else {
                $res4=-1;
            }
          
       ?>
            <div class="ComaparasionTable">
                <h5 class="titles">Le resultat de comparison </h5>
                <div class="table-container">
                    <table >
                        <thead>
                            <tr>
                                <th style="background-color:#4E4FEB" ><h4>Caractéristiques</h4></th>
                                <th class="header"><h4><?php echo $res1[0]['Nom'] ?></h4></th>
                                <th class="header"><h4><?php echo $res2[0]['Nom'] ?></h4></th>
                                <?php 
                                    if ($id3 != -1) {
                                    ?>
                                        <th class="header"><h4><?php echo $res3[0]['Nom'] ?></h4></th>

                                    <?php
                                    }
                                    if ($id4 != -1) {
                                    ?>
                                        <th class="header"><h4><?php echo $res4[0]['Nom'] ?></h4></th>
                                    <?php                                
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <th class="principlae-carc"><h4>Image de Vehicule</h4></th>
                                <td>
                                    <a href='/ComparateurVehicules/vehicule?id=<?php echo $res1[0]['VehiculeId']?>'  >
                                        <img src="<?php echo $res1[0]['image'] ?>" width="350px" alt="vehicule1" />
                                    </a>
                                </td>
                                <td>
                                    <a href='/ComparateurVehicules/vehicule?id=<?php echo $res2[0]['VehiculeId']?>'  >
                                        <img src="<?php echo $res2[0]['image'] ?>" width="350px" alt="vehicule2" />
                                    </a>
                                </td>
                                <?php if($id3!=-1)
                                {
                                ?>
                                    <td>
                                        <a href='/ComparateurVehicules/vehicule?id=<?php echo $res3[0]['VehiculeId']?>'  >
                                            <img src="<?php echo $res3[0]['image'] ?>" width="350px" alt="vehicule3" />
                                        </a>
                                    </td>
                                <?php
                                }
                                ?>
                                
                                <?php if($id4!=-1)
                                {
                                ?>
                                    <td >
                                        <a href='/ComparateurVehicules/vehicule?id=<?php echo $res4[0]['VehiculeId']?>'  >
                                            <img src="<?php echo $res4[0]['image'] ?>" width="350px" alt="vehicule4" />
                                        </a>
                                    </td>
                                <?php
                                }
                                ?>

                                
                            </tr>
                            <?php 
                                $this->createLigne('Marque',$res1,$res2,$res3,$res4,'','marque','principlae-carc');
                                $this->createLigne('Modèle',$res1,$res2,$res3,$res4,'','modele','principlae-carc');
                                $this->createLigne('Version',$res1,$res2,$res3,$res4,'','Version','principlae-carc');
                                $this->createLigne('Année',$res1,$res2,$res3,$res4,'','Annees','principlae-carc');
                                $this->createLigne('Prix',$res1,$res2,$res3,$res4,'$','Prix','principlae-carc');
                            ?> 
                            <tr >
                                <th colspan=5 style="background-color:#4E4FEB" ><h4 id="dimbtn">Dimensions </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Largeur',$res1,$res2,$res3,$res4,'m','Largeur','sub-headers');
                                $this->createLigne('Hauteur',$res1,$res2,$res3,$res4,'m','Hauteur','sub-headers');
                                $this->createLigne('Capacité',$res1,$res2,$res3,$res4,' places','NombrePlaces','sub-headers');
                                $this->createLigne('Volume de Coffre',$res1,$res2,$res3,$res4,'litres','VolumeCoffre','sub-headers');
                            ?>    
                           
                            <tr >
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimcarc">Caractéristiques </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Energie',$res1,$res2,$res3,$res4,'','Energie','sub-headers');
                                $this->createLigne('Consommation',$res1,$res2,$res3,$res4,'','Consommation','sub-headers');
                                $this->createLigne('Boite de Vitesse',$res1,$res2,$res3,$res4,'','Boite','sub-headers');
                                $this->createLigne('Nombre des Vitesses',$res1,$res2,$res3,$res4,'','NbVitesses','sub-headers');
                            ?> 
                            <tr>
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimperf">Performances </h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Vitesse Maximale',$res1,$res2,$res3,$res4,'km/h','VitesseMaximum','sub-headers');
                                $this->createLigne('Accélération',$res1,$res2,$res3,$res4,'s','Acceleration','sub-headers');
                            ?> 
                            <tr>
                                <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimmotr">Moteur</h4></th>
                            </tr>
                            <?php 
                                $this->createLigne('Nombre de Cylindres',$res1,$res2,$res3,$res4,'','NombreCylindres','sub-headers');
                                $this->createLigne('Nombre de soupapes par cylindre',$res1,$res2,$res3,$res4,'','NombreSoupapesParCylindre','sub-headers');
                                $this->createLigne('Cylindrée	',$res1,$res2,$res3,$res4,'L','Cylindree','sub-headers');
                                $this->createLigne('Puissance DIN',$res1,$res2,$res3,$res4,'Ch','PuissanceDIN','sub-headers');
                                $this->createLigne('Couple moteur',$res1,$res2,$res3,$res4,'Nm','CoupleMoteur','sub-headers');
                                $this->createLigne('Puissance Fiscale',$res1,$res2,$res3,$res4,'Cv','PuissanceFiscale','sub-headers');


                            ?> 
                        
                        </tbody>
                    </table>
                </div>

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