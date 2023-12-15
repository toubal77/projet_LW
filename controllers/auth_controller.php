<?php
  class AuthController {
    public function home() {
      require_once('views/auth/index.php');
    }

    public function error() {
      require_once('views/auth/error.php');
    }
  }
?>