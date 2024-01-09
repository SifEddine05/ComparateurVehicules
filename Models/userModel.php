<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/DataBase.php') ; 

    class UserModel {
        private $db;

        public function __construct()
        {
            $this->db = new DataBaseModel();
        }

        public function NewUser($nom,$prenom,$sexe,$dateNaissance,$email ,$pwd)
        {
            $conn = $this->db->connect();
           try {
                $query = $conn->prepare("INSERT INTO `user`(`Nom`, `Prenom`, `Sexe`, `DateDeNaissance`, `email`, `MotDePasse`, `Status`, `isAdmin`)
                VALUES (:nom, :prenom, :sexe, :dateNaissance,:email, :pwd, 'pending', 0)");

                $query->bindParam(':nom', $nom, PDO::PARAM_STR);
                $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                $query->bindParam(':sexe', $sexe, PDO::PARAM_STR);
                $query->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);

                $query->execute();
                $cookie_name = "user";
                $cookie_value = $conn->lastInsertId();
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


                $this->db->disconnect($conn);

                return 1; 
            } catch (PDOException $e) {
                if ($e->getCode() == '23000' && $e->errorInfo[1] == 1062) {
                    return 2;
                } else {
                    throw $e;
                }
            } 
            
        }

        public function Login($email,$password)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT * FROM `user` WHERE email=:email and STATUS='accepted'");

            
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC);
            if ($userData) {

                $userId = $userData['UserId'];
                $userEmail = $userData['email'];
                $userPasswordHash = $userData['MotDePasse'];
                if($userPasswordHash == md5($password))
                {
                    $cookie_name = "user";
                    $cookie_value = $userId;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    return 1 ;
                }
                else{
                    return -1;

                }
                $this->db->disconnect($conn);
            }



        }



        public function AdminLogin($email,$password)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("SELECT * FROM `user` WHERE email=:email and isAdmin=1 and STATUS='accepted'");

            
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC);
            if ($userData) {

                $userId = $userData['UserId'];
                $userEmail = $userData['email'];
                $userPasswordHash = $userData['MotDePasse'];
                if($userPasswordHash == md5($password))
                {
                    $cookie_name = "admin";
                    $cookie_value = $userId;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    return 1 ;
                }
                else{
                    return -1;

                }
                $this->db->disconnect($conn);
            }



        }

        public function BloquerUser($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `user` SET `Status`='bloquer' WHERE UserId=?") ;
            $query->execute(array($id));
            $this->db->disconnect($conn);
            return 1;
        }

        public function getAllUsers()
        {
            $conn = $this->db->connect();
            $requet = "SELECT * FROM `user` WHERE isAdmin=0";
            $result = $this->db->requete($conn,$requet);
            $this->db->disconnect($conn);
            return $result;
        }


        public function AccepteUser($id)
        {
            $conn = $this->db->connect();
            $query = $conn->prepare("UPDATE `user` SET `Status`='accepted' WHERE UserId=?") ;
            $query->execute(array($id));
            $this->db->disconnect($conn);
            return 1;
        }
        

}

?>