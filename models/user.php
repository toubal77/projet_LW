<?php
require_once('connection.php');
class Utilisateurs {
    public $idUtilisateurs;
    public $nom;
    public $role;
    public $email;
    public $mot_de_passe;

    public function __construct() {

    }

    public function loginUser($email, $password) {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM users WHERE email=:email');
            $req->bindParam(':email', $email);
            $req->execute();
            $user = $req->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                if ($password ==$user['mot_de_passe']) {
                    return $user;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }
    
    
    
    public function registerUser($email, $username, $password) {
        try {
            $db = Db::getInstance();
            
            $req = $db->prepare('INSERT INTO users (nom, email, role, mot_de_passe) VALUES (:username, :email, :role, :password)');
            
            $req->bindValue(':username', $username);
            $req->bindValue(':email', $email);
            $req->bindValue(':role', 'user');
            $req->bindValue(':password', $password);
            $req->execute();
            
            return $req->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }


    public function createUser($email, $username, $role, $password) {
        try {
            $db = Db::getInstance();
            
            $req = $db->prepare('INSERT INTO users (nom, email, role, mot_de_passe) VALUES (:username, :email, :role, :password)');
            
            $req->bindValue(':username', $username);
            $req->bindValue(':email', $email);
            $req->bindValue(':role', $role);
            $req->bindValue(':password', $password);
            $req->execute();
            
            return $req->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public static function findByEmail($email) {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM users WHERE email=:email');
            $req->bindParam(':email', $email);
            $req->execute();
            $user = $req->fetch(PDO::FETCH_ASSOC);
            if($user){
                return false;
            }else{
                return true;
            }

        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }
    
    
    public static function getAllUsers() {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM users');
            $req->execute();

            $users = $req->fetchAll(PDO::FETCH_ASSOC);    
    
            return $users;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }
    
    public static function deleteUser($userId) {
        try {
            $db = Db::getInstance();

            $req = $db->prepare('DELETE FROM users WHERE idUtilisateurs = :userId');
            $req->bindValue(':userId', $userId);
            $req->execute();

           if($req){
            return true;
           }else{
            return false;
           }
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }
 
    public function setIdUtilisateurs($idUtilisateurs) {
        $this->idUtilisateurs = $idUtilisateurs;
    }
 
        public function getIdUtilisateurs() {
            return $this->idUtilisateurs;
        }
    
  
        public function setNom($nom) {
            $this->nom = $nom;
        }
    
     
        public function getNom() {
            return $this->nom;
        }
    
 
        public function setRole($role) {
            $this->role = $role;
        }
    
     
        public function getRole() {
            return $this->role;
        }
    

        public function setEmail($email) {
            $this->email = $email;
        }
    
 
        public function getEmail() {
            return $this->email;
        }
    
       
        public function setMotDePasse($mot_de_passe) {
            $this->mot_de_passe = $mot_de_passe;
        }
    
      
        public function getMotDePasse() {
            return $this->mot_de_passe;
        }
}
?>
