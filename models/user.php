<?php

class Utilisateurs {
    public $idUtilisateurs;
    public $nom;
    public $role;
    public $email;
    public $mot_de_passe;

    public function loginUser($email, $password) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email AND mot_de_passe = :password');
        $req->execute(array('email' => $email, 'password' => $password));

        $user = $req->fetch();

        if ($user) {
            // Replace 'role' with your actual column name
            return new Utilisateurs($user['idUtilisateurs'], $user['nom'], $user['role'], $user['email'], $user['mot_de_passe']);
        } else {
            return null; // Authentication failed
        }
    }
    

    public function registerUser($email, $username, $password) {
        $db = Db::getInstance();

        // Replace 'users' with your actual table name and adjust column names accordingly
        $req = $db->prepare('INSERT INTO users (nom, email, mot_de_passe) VALUES (:username, :email, :password)');
        $req->execute(array('username' => $username, 'role' => 'user' ,'email' => $email, 'password' => $password));

        // Check if the insertion was successful
        if ($req->rowCount() > 0) {
            return true; // User inserted successfully
        } else {
            return false; // Failed to insert user
        }
    }
    

    // Lors de la création d'un compte
    public static function emailExists($email, $ignore_id = null) {
        $user = static::findByEmail($email);

        if ($user) {
            return true;
        }
        return false;
    }

    public static function findByEmail($email) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));

        $user = $req->fetch();

        if ($user) {
            // Replace 'role' with your actual column name
            return new Utilisateurs($user['idUtilisateurs'], $user['nom'], $user['role'], $user['email'], $user['mot_de_passe']);
        } else {
            return null; // User not found
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
