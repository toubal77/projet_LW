<?php
session_start();
require_once('models/user.php');
  class AdminController {
    public function index() {

        try {
          $this->utilisateurs = new Utilisateurs();
          if(isset($_POST["submitForm"])){
            if (isset($_POST['userId'])) {
              $userId = $_POST['userId'];
              $user = $this->utilisateurs->deleteUser($userId);
              if($user){
                echo '<script>';
                echo 'alert("L\'utilisateur a été supprimer avec succès");';
                echo 'window.location.href = "/project_LW/admin/index";'; 
                echo '</script>';
  
              }else{
                echo '<script>';
                echo 'alert("L\'utilisateur n\'a pas été supprimé, une erreur est survenue");';
                echo 'window.location.href = "/project_LW/admin/index";'; 
                echo '</script>';
              }
            }
          }
          $users = $this->utilisateurs->getAllUsers();
          require_once('views/admin/index.php');
      } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
    



 
    }

    public function error() {
      require_once('views/admin/error.php');
    }
    public function createUser() {
      try {
        if(isset($_POST["submitForm"])){
            $this->utilisateurs = new Utilisateurs();
            
            if (isset($_POST['email']) && isset($_POST['password']) &&isset($_POST['role']) && isset($_POST['username'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $username = $_POST['username'];
                $role = $_POST['role'];
        echo $email."-".$password."-".$username."-".$role.
                $user = $this->utilisateurs->createUser($email, $username, $role, $password);
      
                if ($user) {
                  echo '<script>';
                  echo 'alert("Utilisateur crée avec succès");';
                  echo 'window.location.href = "/project_LW/admin/index";'; 
                  echo '</script>';
                  
                } else {
                  echo '<script>';
                  echo 'alert("Erreur de création de compte ou email existe déjà. Veuillez réessayer");';
                  echo 'window.location.href = "/project_LW/admin/createUser";'; 
                  echo '</script>';
                }
            } else {
              echo '<script>';
              echo 'alert("Veuillez remplir tous les champs du formulaire");';
              echo 'window.location.href = "/project_LW/admin/createUser";'; 
              echo '</script>';
            }
        }else{
          require_once('views/admin/createUser.php');
        }
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
    }
  }
?>