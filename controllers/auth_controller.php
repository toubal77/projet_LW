<?php
  class AuthController {


    public function index() {
      require_once('views/auth/index.php');
    }

    public function signUp() {
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

  public function login() {
    $this->utilisateurs = new Utilisateurs();
    // Handle login form submission
    if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];
        $user = $this->utilisateurs->loginUser($email, $password);

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
?>