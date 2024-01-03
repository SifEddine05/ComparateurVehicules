<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class LoginAdminPage {
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
                <label for="emailLogin">Email Ou UserName <span> *</span></label>
                <input type="email" id="emailLogin" placeholder='Entrez votre email ou bien votreUserName' name="emailLogin" required><br>

                <label for="passwordLogin">Mot de passe   <span> *</span></label>
                <input type="password" id="passwordLogin" placeholder='Entrez votre mot de passe' name="passwordLogin" required><br>
            
                <p>Vous n'avez pas un compte allez à<a href='/ComparateurVehicules/signup'> Inscription</a></p>
                
                <input type="submit" id='LoginBtnAdmin' value="Connexion">
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