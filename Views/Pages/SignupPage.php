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
            <div class="SignupForm" >
                <label for="nom">Nom <span> *</span></label>
                <input type="text" id="NomSignup" placeholder='Entrez votre nom' name="nom" required><br>
                
                <label for="prenom">Prenom <span> *</span></label>
                <input type="text" id="PrenomSignup"  placeholder='Entrez votre prenom' name="prenom" required><br>

                <label for="sexe">Sexe <span> *</span></label>
                <select name="sexe" id="SexeSignup">
                    <option value='homme'>Homme </option>
                    <option value='femme'>Femme </option>
                </select>

                <label for="dateNaissance">Date de naissance <span> *</span></label>
                <input type="date"  id="DateSignup" name="dateNaissance" required><br>
                
                <label for="email">Email  <span> *</span></label>
                <input type="email" id="EmailSignup" placeholder='Entrez votre email' name="email" required><br>

                <label for="password">Mot de passe   <span> *</span></label>
                <input type="password" id="PwdSignup" placeholder='Entrez votre mot de passe' name="password" required><br>
            
                <p>Avez vous déja un compte allez à<a href='/ComparateurVehicules/login'> Connexion</a></p>
                
                <input type="submit" id='InscrptionBtn' value="Inscription">
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