<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class SignupPage {
    private $user ;
    private $UserComponents ;

 

    public function __construct()
    {
        $this->user = new UserController();
        $this->UserComponents = new UserComponents();

    }
    public function LoginForm()
    {?>
        <div class="SignupForm-container">
            <h5 class='titles'>Crée un compte</h5>
            <div class="SignupForm">
                <label for="nom">Nom <span> *</span></label>
                <input type="text"  name="nom" required><br>
                
                <label for="prenom">Prenom <span> *</span></label>
                <input type="text"  name="prenom" required><br>

                <label for="sexe">Sexe <span> *</span></label>
                <input type="text"  name="sexe" required><br>

                <label for="dateNaissance">Date de naissance <span> *</span></label>
                <input type="text"  name="dateNaissance" required><br>
                
                <label for="email">Email  <span> *</span></label>
                <input type="email"  name="email" required><br>

                <label for="password">Mot de passe   <span> *</span></label>
                <input type="password"  name="password" required><br>
            
                <p>Avez vous déja un compte allez à<a href='/ComparateurVehicules/login'> Connexion</a></p>
                
                <input type="submit"  value="Inscription">
            </div>
        </div>
    <?php
    }

    public function getPage(){
        echo "<body class='SignupBody'>";
        $this->LoginForm();
        echo "</body> </html>";
    }
}