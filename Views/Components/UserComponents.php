<?php
    require_once("Controllers/ContactController.php");
    require_once("Controllers/DiaporamaController.php");
    require_once("Controllers/MarqueController.php");

        
        
          

    class UserComponents {
        private $Conctrl ; 
        private $diapctrl ; 
        private $Marquectrl ; 

        public function __construct()
        {
            $this->Conctrl = new ContactController();
            $this->diapctrl = new DiaporamaController();
            $this->Marquectrl = new MarqueController();


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


        public function Diaporama()
        {
            $res = $this->diapctrl->getDiaporama();
            ?>
            <div class="container-diapo">
                <div class="diapo-text">
                <h2>
                    <h1>Avec Notre Website</h1>
                    <a  class="typewrite" data-period="2000" data-type='[ "Découvrez l avenir automobile ", "Explorez les dernières actualités et publicités ", "Des conseils éclairés pour des décisions automobiles" ]'>
                        <span class="wrap"></span>
                    </a>
                </h2>
                </div>
                <div class="diaporama">
                        <div class="box"></div>
                    <?php
                    foreach($res as  $key => $d)
                    {
                        $class = ($key === 0) ? 'active' : '';
                    ?>
                            
                            <a class="<?php echo $class; ?>" href=<?php echo $d['url'] ?> >
                                <img class="<?php echo $class; ?>" src="<?php echo $d['image']; ?>" alt="diaporama"/>
                                <h3 class="<?php echo $class; ?>"><?php  if($d['Type']=="pub"){
                                echo "Publicite" ;
                            }
                            else{
                                echo "News";
                            } ?></h3>
                        </a>
                        

                    <?php
                    }
                    ?>
                </div>
            
            </div>
            <?php
            // print_r($res);
        } 

        public function menu()
        {
            ?>
            <div class="menu-container">
                <a href="/ComparateurVehicules">Accueil</a>
                <a href="News">News</a>
                <a  href="Comparateur">Comparateur</a>
                <a  href="Marque">Marque</a>
                <a  href="Avis">Avis</a>
                <a  href="GuideAchat">Guide Achat</a>
                <a  href="Contact">Contact</a>
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
                <a href="News">News</a>
                <a  href="Comparateur">Comparateur</a>
                <a  href="Marque">Marque</a>
                <a  href="Avis">Avis</a>
                <a  href="GuideAchat">Guide Achat</a>
                <a  href="Contact">Contact</a>
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

        public function form($id,$n)
        {

            if($n % 2 ==0) {
                $img = "/ComparateurVehicules/assets/image1.webp"  ;
            }
            else{
                $img = "/ComparateurVehicules/assets/V2.png";
            }
            ?>
            <form class="form-div" id="form<?php echo $n ?>">
                    <div class="image-v1">
                        <img src=<?php echo $img ?> width="400px"/>

                    </div>
                    <h5>Vehicule <?php echo $n ?></h5>
                    <div class="selects-container">
                        <div class="custom-select">
                            <label class="lables" for="marque<?php echo $id ?>">Marque</label>
                            <input type="text" id="searchInput<?php echo $id ?>" name="marque<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required" >
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown-item" onclick="selectOption('Option 1',<?php echo $id ?>) ">Option 1</div>
                                <div class="dropdown-item" onclick="selectOption('Option 2',<?php echo $id ?>)">Option 2</div>
                                <div class="dropdown-item" onclick="selectOption('Option 3',<?php echo $id ?>)">Option 3</div>
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="model<?php echo $id ?>">Modèle</label>
                            <input type="text" id="searchInput<?php echo $id ?>" name="modele<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown-item" onclick="selectOption('Option 1',<?php echo $id ?>) ">Option 1</div>
                                <div class="dropdown-item" onclick="selectOption('Option 2',<?php echo $id ?>)">Option 2</div>
                                <div class="dropdown-item" onclick="selectOption('Option 3',<?php echo $id ?>)">Option 3</div>
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="version<?php echo $id ?>">Version</label>
                            <input type="text" id="searchInput<?php echo $id ?>" name="version<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown-item" onclick="selectOption('Option 1',<?php echo $id ?>) ">Option 1</div>
                                <div class="dropdown-item" onclick="selectOption('Option 2',<?php echo $id ?>)">Option 2</div>
                                <div class="dropdown-item" onclick="selectOption('Option 3',<?php echo $id ?>)">Option 3</div>
                            </div>
                        </div>
                        <?php $id=$id+1 ?>
                        <div class="custom-select">
                            <label class="lables" for="annee<?php echo $id ?>">Année</label>
                            <input type="text" id="searchInput<?php echo $id ?>" name="annee<?php echo $id ?>" oninput="filterOptions(<?php echo $id ?>)" onclick="showallOptions(<?php echo $id ?>)" required="required">
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown-item" onclick="selectOption('Option 1',<?php echo $id ?>) ">Option 1</div>
                                <div class="dropdown-item" onclick="selectOption('Option 2',<?php echo $id ?>)">Option 2</div>
                                <div class="dropdown-item" onclick="selectOption('Option 3',<?php echo $id ?>)">Option 3</div>
                            </div>
                        </div>
                    </div>
                    
                </form>  
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
           
            <div class="grid-container">

               <?php $this->form(1,1) ?> 
               <?php $this->form(5,2) ?> 
               <?php $this->form(9,3) ?> 
               <?php $this->form(13,4) ?> 

                
            </div>
            <button> submit </button>
            
        </div>

        <?php
        }


    }
?>