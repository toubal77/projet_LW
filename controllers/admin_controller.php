<?php
session_start();
require_once('models/user.php');
require_once('models/illustration.php');
  class AdminController {
    public function index() {

        try {
          if(!isset($_SESSION['user'])){
            header("Location: /project_LW/auth/index");
          }
          $this->utilisateurs = new Utilisateurs();
          $this->illustration = new Illustration();
          if(isset($_POST["submitFormDelete"])){
            if (isset($_POST['illId'])) {
              $illId = $_POST['illId'];
              $ill = $this->illustration->deleteIllustration($illId);
              if($ill){
                echo '<script>';
                echo 'alert("L\'illustration a été supprimer avec succès");';
                echo 'window.location.href = "/project_LW/admin/index";'; 
                echo '</script>';
  
              }else{
                echo '<script>';
                echo 'alert("L\'illustraion n\'a pas été supprimé, une erreur est survenue");';
                echo 'window.location.href = "/project_LW/admin/index";'; 
                echo '</script>';
              }
            }
          }
      //    $users = $this->utilisateurs->getAllUsers();
         $illustrations = $this->illustration->getAllIllustrations();
      //    echo "----ici" . print_r($illustrations, true);
          require_once('views/admin/index.php');
      } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
  
 
    }

    public function consulteUser() {
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
      $this->utilisateurs = new Utilisateurs();
      $users = $this->utilisateurs->getAllUsers();
      require_once('views/admin/consulteUser.php');
    }
    

    public function show() {
      require_once('views/admin/show.php');
  }



    public function error() {
      require_once('views/admin/error.php');
    }
    public function createUser() {
      try {
        if(!isset($_SESSION['user'])){
            header("Location: /project_LW/auth/index");
          }
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