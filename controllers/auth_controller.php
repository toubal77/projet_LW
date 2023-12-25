<?php
session_start();
  class AuthController {

    public function index() {

      if(isset($_POST["submitForm"])){
        $this->utilisateurs = new Utilisateurs();
        // Handle login form submission
        if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
            $email = $_POST['email'];
            $password = $_POST['mot_de_passe'];
            $user = $this->utilisateurs->loginUser($email, $password);
    
            if ($user) {
              $_SESSION['user'] = $user;
              $_SESSION['id']= $user['idUtilisateurs'];
              $_SESSION['username']= $user['nom'];
              $_SESSION['email']= $user['email'];
              $_SESSION['role']= $user['role'];
              if($user['role']='admin'){
               require_once('views/admin/index.php');
              }else if($user['role']='user'){
                require_once('views/posts/index.php');
              }
            } else {
              require_once('views/posts/index.php');
                echo "error authentication";
            }
        } else {
        }
      }
      require_once('views/auth/index.php');
    }

    public function signUp() {
      if(isset($_POST["submitForm"])){
        $this->utilisateurs = new Utilisateurs();
        // Handle login form submission
        if (isset($_POST['email']) && isset($_POST['mot_de_passe'])&& isset($_POST['username'])) {
            $email = $_POST['email'];
            $password = $_POST['mot_de_passe'];
            $username = $_POST['username'];
            $user = $this->utilisateurs->registerUser($email,$username, $password);
    
            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['id']= $user['idUtilisateurs'];
                $_SESSION['username']= $user['nom'];
                $_SESSION['email']= $user['email'];
                $_SESSION['role']= $user['role'];
                require_once('views/posts/index.php');
              
            } else {
              require_once('views/posts/index.php');
                echo "error authentication";
            }
        } else {
        }
      }
      require_once('views/auth/signUp.php');
    }

    public function error() {
      require_once('views/auth/error.php');
    }
  

    public function handleRequest() {
      if (isset($_POST['submitForm'])) {
          $this->login();
      }

      // Other logic and view rendering
  }

public function signUpUser() {
  $this->utilisateurs = new Utilisateurs();
  // Handle login form submission
  if(isset($_POST['submit'])){
  if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['mot_de_passe'])) {
      $email = $_POST['email'];
      $password = $_POST['mot_de_passe'];
      $user = $this->utilisateurs->registerUser($email, $password);
      if ($user) {
          require_once('views/admin/index.php');
      } else {
          echo "error authentication";
      }
  } else {
      // Display login form or handle invalid request
  }
}
}

  }
?>