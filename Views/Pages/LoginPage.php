<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class LoginPage {
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
            <h5 class='titles'>Connectez-Vous</h5>
            <div class="SignupForm" > 
                <label for="email">Email  <span> *</span></label>
                <input type="email" id="EmailSignup" placeholder='Entrez votre email' name="email" required><br>

                <label for="password">Mot de passe   <span> *</span></label>
                <input type="password" id="PwdSignup" placeholder='Entrez votre mot de passe' name="password" required><br>
            
                <p>Vous n'avez pas un compte allez à<a href='/ComparateurVehicules/signup'> Inscription</a></p>
                
                <input type="submit" id='InscrptionBtn' value="Connexion">
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