<?php
  class AdminController {
    public function index() {
      echo "appelle admin page";
      require_once('views/admin/index.php');
    }

    public function error() {
      require_once('views/admin/error.php');
    }
  }
?>