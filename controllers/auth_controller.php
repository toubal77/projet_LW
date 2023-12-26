<?php
session_start();
require_once('models/user.php');
  class AuthController {

    public function index() {
      try {
      if(isset($_POST["submitForm"])){
        $this->utilisateurs = new Utilisateurs();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->utilisateurs->loginUser($email, $password);
            if ($user) {
              $_SESSION['user'] = $user;
              $_SESSION['id']= $user['idUtilisateurs'];
              $_SESSION['username']= $user['nom'];
              $_SESSION['email']= $user['email'];
              $_SESSION['role']= $user['role'];
              if($user['role']=='admin'){
               require_once('views/admin/index.php');
              }else if($user['role']=='user'){
                require_once('views/posts/index.php');
              }
            } else {
           //   require_once('views/posts/index.php');
           echo "Votre identifiant semble incorrect <a href='/project_LW/auth/index'>réessayer</a>";
            }
        } else {
          echo "Veuillez remplir tous les champs du formulaire";
        }
      }else{
      require_once('views/auth/index.php');
      }
    } catch (Exception $e) {
      echo "Une erreur s'est produite : " . $e->getMessage();
  }
    }

    public function signUp() {
      try {
          if(isset($_POST["submitForm"])){
              $this->utilisateurs = new Utilisateurs();
              
              if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
                  $email = $_POST['email'];
                  $password = $_POST['password'];
                  $username = $_POST['username'];
          
                  $user = $this->utilisateurs->registerUser($email, $username, $password);
        
                  if ($user) {
                      echo "Votre compte a été créé avec succès. Connectez-vous <a href='/project_LW/auth/index'>ICI</a>";
                  } else {
                      echo "Erreur de création de compte ou email existe deja. Veuillez <a href='/project_LW/auth/signUp'>réessayer</a>";
                  }
              } else {
                  echo "Veuillez remplir tous les champs du formulaire";
              }
          }else{
            require_once('views/auth/signUp.php');
            }
      } catch (Exception $e) {
          echo "Une erreur s'est produite : " . $e->getMessage();
      }
      
  }


  public function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /project_LW/auth/index");
  }
    public function error() {
      require_once('views/auth/error.php');
    }

  }
?>