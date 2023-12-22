<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/ContactController.php');

class ContactPage {
        private $contactctl ; 
        private $UserComponents ;

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
            $this->contactctl = new ContactController();
        }

        public function ContactSection()
        {
            $contacts = $this->contactctl->getContacts();
        ?>
            <div class="ContactSection">
                <h5 class="titles">Contactez-nous</h5>
                <div class="contactsection-container">
                    <div class="contact-informations">
                        <p>Besoin d'informations supplémentaires ?</p>
                        <span>Que vous ayez des questions sur nos comparaisons de véhicules ou que vous souhaitiez partager vos commentaires, n'hésitez pas à nous contacter. Remplissez le formulaire ci-dessous, et nous vous répondrons dans les plus brefs délais.</span>

                        <div class="contacts-infos">
                        <?php    
                        foreach($contacts as $ct)
                        {
                        ?>
                        <div >
                            <img src="<?php echo $ct['logo'] ?>"  class='logos-contact' widht="75px" alt="contact" /> 
                            <a  href="<?php echo $ct['url'] ?>" target="_blank" ><?php echo $ct['Name'] ?></a>
                        </div>
                            
                                    
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="from-email">
                        <div >
                            <label for="name">Nom <span> *</span></label>
                            <input type="text" id="MsgName" name="name" required><br>
                            
                            <label for="email">Email <span> *</span></label>
                            <input type="email" id="MsgEmail" name="email" required><br>
                            
                            <label for="message">Message <span> *</span></label>
                            <textarea name="message" id="MsgMsg" rows="7" required></textarea><br>
                            
                            <input type="submit" id="EnvoyerMsg" value="Envoyer">
                        </div>
                        
                    </div>
                </div>
            </div>
            
        <?php
        }
    


        public function getPage()
        {
           
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->ContactSection();
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }



}