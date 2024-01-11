<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/AvisController.php');

        
        
          

    class UserComponents {
        private $Conctrl ; 
        private $Marquectrl ; 
        private $vehctl ; 
        private $avisctl ; 
        public function __construct()
        {
            $this->Conctrl = new ContactController();
            $this->Marquectrl = new MarqueController();
            $this->vehctl = new VehiculeController();
            $this->avisctl = new AvisController();



        }
        public function Header()
        {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Document</title>
            </head>';
        }
        
        public function NavBar()
        {
            echo "
            <div class='NavBar'>
                <img src='assets/logoo.png' alt='logo' width='80px'/>
                <div class='contacts-container'>";
            $contacts = $this->Conctrl->getContacts();

            foreach($contacts as $ct)
            {
                ?>
                    <a  href="<?php echo $ct['url'] ?>" target="_blank" >
                        <img src="<?php echo $ct['logo'] ?>"  class="img-contact" widht="75px" alt="contact" /> 
                    </a>
                    
                    <?php
                ;
            }
            ?>
                </div>
            <?php
            if (isset($_COOKIE['user'])) {?>
                <div class="button-container">
                    <a id='FavoriteA' href='/ComparateurVehicules/favoris'>
                        <img src='/ComparateurVehicules/assets/Fav.png' width='40px' />
                    </a>
                    <button class="button" id='LogoutBtn'>Déconnexion</button>
                </div>
            <?php } 
            else {?>
                <div class="button-container">
                    <a class="button" href='/ComparateurVehicules/login'>Connexion</a>
                    <a class="button" href='/ComparateurVehicules/signup'>Inscription</a>
                </div>
            <?php } 
            ?>
                
            </div>            
         <?php   
        }


        

        public function menu()
        {
            ?>
            <div class="menu-container">
                <a href="/ComparateurVehicules">Accueil</a>
                <a href="/ComparateurVehicules/news">News</a>
                <a  href="/ComparateurVehicules/compare">Comparateur</a>
                <a  href="/ComparateurVehicules/marque">Marque</a>
                <a  href="/ComparateurVehicules/avis">Avis</a>
                <a  href="/ComparateurVehicules/guideachat">Guide Achat</a>
                <a  href="/ComparateurVehicules/contact">Contact</a>
            </div>
            <?php
        }

        public function footer()
        {
        ?>
        <footer>
            <div class="social-container">
                <?php
                $contacts = $this->Conctrl->getContacts();

                foreach($contacts as $ct)
                {
                    ?>
                        <a  href="<?php echo $ct['url'] ?>" target="_blank" >
                            <img src="<?php echo $ct['logo'] ?>"  class="img-contact" widht="75px" alt="contact" /> 
                        </a>
                        
                        <?php
                    ;
                }
                ?>
            </div>
            <div class="list-liens">
                <a href="/ComparateurVehicules">Accueil</a>
                <a href="/ComparateurVehicules/news">News</a>
                <a  href="/ComparateurVehicules/compare">Comparateur</a>
                <a  href="/ComparateurVehicules/marque">Marque</a>
                <a  href="/ComparateurVehicules/avis">Avis</a>
                <a  href="/ComparateurVehicules/guideachat">Guide Achat</a>
                <a  href="/ComparateurVehicules/contact">Contact</a>
            </div>
            <p class="copyright">Auto Look © 2023</p>
        </footer>
        <?php
        }

        public function principaleMarques($type)
        {
            $marques = $this->Marquectrl->getPrincipaleMarque() ;
            ?>

            <div class="principale-marques-super-container">
                <h1 class="titles">Les Marques Principales </h1>
                <div class="principale-marques-container">
                    <?php
                    foreach($marques as   $m){
                    ?>
                        <div class="principale-marques">
                            <a href="<?php if($type == 0){ echo 'marque?id='.$m['MarqueId'] ; } else{ echo 'avis?id='.$m['MarqueId']; } ?> ">
                                <img src=<?php echo $m['logo'] ?> width="200px"/>
                            </a>
                        </div>

                    <?php
                    }?>
                </div>
            </div>
        <?php
        }

        public function showOptionsModele($marque,$id)
        {
            $modeles = $this->vehctl->getModeleByMarque($marque);
            foreach($modeles as $mod)
            {?>
                <div class="dropdown-item" onclick="selectOption(<?php echo $mod['ModeleId'] ?>,<?php echo $id ?>,'<?php echo $mod['Name'] ?>')"><?php echo $mod['Name'] ?></div>
            <?php
            }
                  
        }

        public function showOptionsVersion($modele,$id)
        {
            $modeles = $this->vehctl->getVersionByModele($modele);
            foreach($modeles as $mod)
            {?>
                <div class="dropdown-item" onclick="selectOption('<?php echo $mod['version'] ?>','<?php echo $id ?>','<?php echo $mod['version'] ?>')"><?php echo $mod['version'] ?></div>
            <?php
            }
        }

        public function showOptionsAnnee($version,$id)
        {
            $versions = $this->vehctl->getAnneeByVersion($version);
            ?>
            <?php
            foreach($versions as $vr)
            {?>
                <div  class="dropdown-item" onclick="selectOption('<?php echo $vr['VehiculeId'] ?>','<?php echo $id ?>','<?php echo $vr['Annees'] ?>')"><?php echo $vr['Annees'] ?></div>
            <?php
            }
        }


        public function form($id,$n)
        {
            $marques = $this->Marquectrl->getAllMarques() ;

            if($n % 2 ==0) {
                $img = "/ComparateurVehicules/assets/image1.webp"  ;
            }
            else{
                $img = "/ComparateurVehicules/assets/V2.png";
            }
            ?>
            <div class="form-div" id="form<?php echo $n ?>">

                    <div class="image-v1">
                        <img src=<?php echo $img ?> width="400px"/>

                    </div>
                    <h5>Vehicule <?php echo $n ?></h5>
                    <div class="selects-container">
                        <div class="custom-select">
                            <label class="lables" for="marque<?php echo $id ?>">Marque</label>
                            <input type="text" id="searchInput<?php echo $id ?>" name="marque<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)"  onclick="showallOptions(<?php echo $id ?>)" required="required" >
                            <input type="hidden"  id="hidesearchInput<?php echo $id ?>" name="hidemarque<?php echo $id ?>" >

                            <div class="dropdown drop-div1" id="dropdown">
                            <?php 
                                foreach($marques as $mark)
                                {?>
                                    <div class="dropdown-item" onclick="selectOption(<?php echo $mark['MarqueId'] ?>,<?php echo $id ?>,'<?php echo $mark['Nom'] ?>')"><?php echo $mark['Nom'] ?></div>
                                <?php
                                }
                            ?>
                               
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="model<?php echo $id ?>">Modèle</label>
                            <input type="text" id="searchInput<?php echo $id ?>" disabled="true" name="modele<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <input type="hidden"  id="hidesearchInput<?php echo $id ?>" name="hidemodele<?php echo $id ?>" >

                            <div class="dropdown drop-div2" id="dropdown">
                               
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="version<?php echo $id ?>">Version</label>
                            <input type="text" id="searchInput<?php echo $id ?>"   disabled="true"  name="version<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <input type="hidden"  id="hidesearchInput<?php echo $id ?>" name="hideversion<?php echo $id ?>" >

                            <div class="dropdown drop-div3" id="dropdown">
                              
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="annee<?php echo $id ?>">Année</label>
                            <input type="text" id="searchInput<?php echo $id ?>"  disabled="true"  name="annee<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <input type="hidden"  id="hidesearchInput<?php echo $id ?>" name="hideannee<?php echo $id ?>" >

                            <div class="dropdown drop-div4" id="dropdown">
                                
                            </div>
                        </div>
                    </div>
                    
                </div>  
        <?php
        }


        public function formComparation()
        { 
        ?>
        <div class="form-container">
            <h1 class="titles">Comparez Vehicules</h1>
            <div class="nbrVehicule">
                <label for="NombreVehicule">Entrez le nombre des vehicules à comparer</label>
                <select id="NombreVehicule" name="NombreVehicule" >
                        <option value=2> 2 Vehicules</option>
                        <option value=3> 3 Vehicules</option>
                        <option value=4> 4 Vehicules</option>
                </select>
            </div>
           
            <form action="/ComparateurVehicules/api/apiRoute.php" method="POST" id="MainForm" class="grid-container">

               <?php $this->form(1,1) ?> 
               <?php $this->form(5,2) ?> 
               <?php $this->form(9,3) ?> 
               <?php $this->form(13,4) ?> 

                
            </form>
            <span id="error-from" >S'il vous plaît remplissez tous les champs</span>
            <button id="CompareBtn"> Compare  </button>
            
        </div>

        <?php
        }


        public function MarqueInformation($id,$type)
        {
            $marqueInfo = $this->Marquectrl->getMarqueById($id)[0];
            $principaleVehc= $this->Marquectrl->getPrincipaleVehicules($id);
            $Allvehicules = $this->Marquectrl->getAllVehicules($id);
        ?>
            <div class="MarqueInfos-container">
                <h5 class='titles'>Les Informations de la marque</h5>
                <div class="MarqueInfos">
                    <div class="MarqueNL">
                        <div class="MarqueName">
                            <h4><?php echo $marqueInfo['Nom'] ?></h4>
                        </div>
                        <div class="MarqueLogo">
                            <img src='<?php echo $marqueInfo['logo'] ?>' width="100%"/>
                        </div>
                    </div>
                    <div class="Marqueinfo">
                        <p class='titl'>Pays d'origine </p>
                        <p class='info'><?php echo $marqueInfo['PaysOrigine'] ?></p>
                    </div>
                    <div class="Marqueinfo">
                        <p class='titl'>Siège Social</p>
                        <p class='info'><?php echo $marqueInfo['SiegeSociale'] ?></p>
                    </div>
                    <div class="Marqueinfo">
                        <p class='titl'>Année de création</p>
                        <p class='info'><?php echo $marqueInfo['AnneeCreation'] ?></p>
                    </div>
                </div>
                <div class='PrncipaleVehicules'>
                    <h5 >Les vehicules principales</h5>
                    <div class='listVechlsPrincipale'>
                        <?php 
                        foreach($principaleVehc as $vech)
                        {
                        ?>
                            <a href='<?php if ($type == 0) echo "/ComparateurVehicules/vehicule?id=".$vech['VehiculeId']; else echo "/ComparateurVehicules/avisVehicule?id=".$vech['VehiculeId']; ?>'>
                                <img src='<?php echo $vech['image'] ?>' width="250px" />
                                <p><?php echo  $vech['Nom'] ?></p>
                            </a>
                        <?php
                        }
                       ?>
                    </div>
                </div>
                <div class='List-Vehicule-Choose'>
                    <h5 >Coisissez une voiture pour affichier ces spécifications :</h5>
                    <div class='select-container'>
                        <select name='VehiculeInfoSelect' id='SelectVechMark'>
                            <option value=-1>Selectionner une vehicule</option>
                            <?php 
                                foreach($Allvehicules as $veh)
                                {
                                ?>
                                    <option value=<?php echo $veh['VehiculeId']?>><?php echo $veh['Nom'] ?></option>
    
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="vehiculeinfo" id="vchinfos"></div>
    
        <?php
        }
    
        public function createLigne($titile,$res1,$unit,$elem,$class)
        {
        ?>
            <tr >
                <th class="<?php echo $class?>"  ><h4><?php echo $titile?></h4></th>
                <td><h4><?php echo $res1[0][$elem]?> <?php echo $unit ?></h4></td>
            </tr> 
    
        <?php
        }
        public function VehiculeInformations($id,$type)
        { 
            $res1 = $this->vehctl->getVehiculeById($id);
        ?>
            <div class="table-container" id="table-vch-marque">
                        <table >
                            <thead>
                                <tr>
                                    <th style="background-color:#4E4FEB" ><h4>Caractéristiques</h4></th>
                                    <th class="header"><h4><?php echo $res1[0]['Nom'] ?></h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <th class="principlae-carc"><h4>Image de Vehicule</h4></th>
                                    <td>
                                        <a href='<?php if ($type == 0) echo "/ComparateurVehicules/vehicule?id=".$id; else echo "/ComparateurVehicules/avisVehicule?id=".$id; ?>'  >
                                            <img src="<?php echo $res1[0]['image'] ?>" width="350px" alt="vehicule1" />
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    $this->createLigne('Marque',$res1,'','marque','principlae-carc');
                                    $this->createLigne('Modèle',$res1,'','modele','principlae-carc');
                                    $this->createLigne('Version',$res1,'','Version','principlae-carc');
                                    $this->createLigne('Année',$res1,'','Annees','principlae-carc');
                                    $this->createLigne('Prix',$res1,'$','Prix','principlae-carc');
                                ?> 
                                <tr >
                                    <th colspan=5 style="background-color:#4E4FEB" ><h4 id="dimbtn">Dimensions </h4></th>
                                </tr>
                                <?php 
                                    $this->createLigne('Largeur',$res1,'m','Largeur','sub-headers');
                                    $this->createLigne('Hauteur',$res1,'m','Hauteur','sub-headers');
                                    $this->createLigne('Capacité',$res1,' places','NombrePlaces','sub-headers');
                                    $this->createLigne('Volume de Coffre',$res1,'litres','VolumeCoffre','sub-headers');
                                ?>    
                               
                                <tr >
                                    <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimcarc">Caractéristiques </h4></th>
                                </tr>
                                <?php 
                                    $this->createLigne('Energie',$res1,'','Energie','sub-headers');
                                    $this->createLigne('Consommation',$res1,'','Consommation','sub-headers');
                                    $this->createLigne('Boite de Vitesse',$res1,'','Boite','sub-headers');
                                    $this->createLigne('Nombre des Vitesses',$res1,'','NbVitesses','sub-headers');
                                ?> 
                                <tr>
                                    <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimperf">Performances </h4></th>
                                </tr>
                                <?php 
                                    $this->createLigne('Vitesse Maximale',$res1,'km/h','VitesseMaximum','sub-headers');
                                    $this->createLigne('Accélération',$res1,'s','Acceleration','sub-headers');
                                ?> 
                                <tr>
                                    <th colspan=5 style="background-color:#4E4FEB"><h4 id="dimmotr">Moteur</h4></th>
                                </tr>
                                <?php 
                                    $this->createLigne('Nombre de Cylindres',$res1,'','NombreCylindres','sub-headers');
                                    $this->createLigne('Nombre de soupapes par cylindre',$res1,'','NombreSoupapesParCylindre','sub-headers');
                                    $this->createLigne('Cylindrée	',$res1,'L','Cylindree','sub-headers');
                                    $this->createLigne('Puissance DIN',$res1,'Ch','PuissanceDIN','sub-headers');
                                    $this->createLigne('Couple moteur',$res1,'Nm','CoupleMoteur','sub-headers');
                                    $this->createLigne('Puissance Fiscale',$res1,'Cv','PuissanceFiscale','sub-headers');
    
    
                                ?> 
                            
                            </tbody>
                        </table>
            </div>
        <?php
        }
    
        public function BestAvis($id)
        { 
            $bestAvis = $this->avisctl->getBestAvisMarque($id);
            $arraySize = count($bestAvis);

        ?>
            <div class='Best-Avis-Section'>
                <div class='Title'>
                    <h5 class='titles'>Les Avis les plus appréciés</h5>
                    <a href='/ComparateurVehicules/avis?id=<?php echo $id ?>'>Voir tous les avis</a>
                </div>
                <?php 
                if($bestAvis)
                {
                ?>
                <div class='BestAvis-container'>
                        <?php 
                        foreach($bestAvis as $b)
                        {
                        ?>
                            <div class='Avis-Container'>
                                <div class='Avis'>
                                    <img src='/ComparateurVehicules/assets/Comment.png' alt='comment' />
                                    <h6><?php echo $b['Commentaire'] ?></h6>
                                    <p>Note : <?php echo $b['Note'] ?>/5⭐</p>
                                </div>
                                <h3> <span>👤</span> <?php echo $b['Nom'].' '.$b['Prenom'] ?></h3>
                            </div>
                        <?php    
                        }
                        ?>

                   

                </div>
                <?php
                }else {
                    echo "<h3 style='color:red'>il n'y a pas d'avis pour cette vethicule</h3>" ;
                }
                ?>
    
            </div>
        <?php
        }   
    
    
        public function AddAvis()
        {
        ?>  
        <div class='AddAvisSection'>
            <h5 class='titles'>Ajouter votre Avis </h5>
            <div class='Avis'>
                <div class='Note-container'>
                    <h3>Note :</h3>
                    <div class="container">
                        <div class="container__items">
                            <input type="radio" name="stars" id="st5" value=5>
                            <label for="st5">
                            <div class="star-stroke">
                                <div class="star-fill"></div>
                            </div>
                            <div class="label-description" data-content="Excellent"></div>
                            </label>
                            <input type="radio" name="stars" id="st4" value=4>
                            <label for="st4">
                            <div class="star-stroke">
                                <div class="star-fill"></div>
                            </div>
                            <div class="label-description" data-content="Good"></div>
                            </label>
                            <input type="radio" name="stars" id="st3" value=3>
                            <label for="st3">
                            <div class="star-stroke">
                                <div class="star-fill"></div>
                            </div>
                            <div class="label-description" data-content="OK"></div>
                            </label>
                            <input type="radio" name="stars" id="st2" value=2>
                            <label for="st2">
                            <div class="star-stroke">
                                <div class="star-fill"></div>
                            </div>
                            <div class="label-description" data-content="Bad"></div>
                            </label>
                            <input type="radio" name="stars" id="st1" value=1>
                            <label for="st1">
                            <div class="star-stroke">
                                <div class="star-fill"></div>
                            </div>
                            
                            </label>
                        </div>
                    </div>
                </div>
                <div class='Comentaire'>
                    <h3>Commentaire : </h3>
                    <textarea  rows="6" cols="100" id='commentAvis'></textarea>
                </div>
                <button id="AddAvisBtn">Ajouter</button>
            </div>
           
            
        </div> 
        
    
        <?php
        }
    

       


        


    }
?>