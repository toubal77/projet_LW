<?php

class Utilisateurs {
    public $idUtilisateurs;
    public $nom;
    public $role;
    public $email;
    public $mot_de_passe;

    public function loginUser($email, $password) {
        echo "login user function ";
        // Logic to check user credentials and return user data if valid
        // Example: SELECT * FROM Utilisateurs WHERE email = ? AND mot_de_passe = ?

        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email AND mot_de_passe = :password');
        $req->execute(array('email' => $email, 'password' => $password));

        $user = $req->fetch();

        if ($user) {
            // Assuming a Utilisateurs class with a constructor that takes user data
            echo $user;
            return new Utilisateurs($user['idUtilisateurs'], $user['nom'],$user['role'], $user['email'], $user['mot_de_passe']);
        } else {
            return null; // Authentication failed
        }
    }
}

?>
