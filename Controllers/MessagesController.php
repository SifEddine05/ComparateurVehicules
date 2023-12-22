<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/MessagesModel.php');

class MessageController{
    private $message ; 
    public function __construct()
    {
        $this->message = new MessageModel();
    }
    
    public function sendMessage($nom , $email , $message)
    {
        $res = $this->message->sendMessage($nom ,$email ,$message);
        return $res ;
    }

}
?>