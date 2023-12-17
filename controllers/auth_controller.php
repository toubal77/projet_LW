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
    // Handle login form submission
    echo "login function ";
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];

        // Validate input data (you might want to use a validation library)
        // ...

        // Attempt to log in
        $user = $this->utilisateursModel->loginUser($email, $password);

        if ($user) {
          require_once('views/admin/index.php');
        } else {
          echo "error authentification";
        }
    } else {
        // Display login form
        // ...
    }
  }
  }
?>