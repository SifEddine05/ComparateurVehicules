<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/MarqueController.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/VehiculeController.php');

        
        
          

    class UserComponents {
        private $Conctrl ; 
        private $Marquectrl ; 
        private $vehctl ; 

        public function __construct()
        {
            $this->Conctrl = new ContactController();
            $this->Marquectrl = new MarqueController();
            $this->vehctl = new VehiculeController();



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
                <div class="button-container">
                    <button class="button">Login</button>
                    <button class="button">SignUp</button>
                </div>
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

        public function principaleMarques()
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
                            <a href="marque?id=<?php echo $m['MarqueId'] ?>">
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


    

       


        


    }
?>