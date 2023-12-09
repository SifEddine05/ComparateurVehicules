<?php 
class DataBaseModel{
       private $dbname="comparateurvehicules";
       private $host="localhost";
       private $user="root";
       private  $password="";

        public function connect ()
        {
            try {
                $dsn="mysql:host=".$this->host.";dbname=".$this->dbname."";
                $c= new PDO($dsn,$this->user,$this->password);
            } catch (PDOException $ex) {
                echo("error:" . $ex->getMessage());
                exit();
            }
            return $c ; 
        }

        public function disconnect(&$c)
        {
            $c =null ;
        }

        
        public function requete($c,$r)
        {
            $stmt = $c->prepare($r);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
        }
}
        
?>