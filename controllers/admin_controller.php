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
  }
?>