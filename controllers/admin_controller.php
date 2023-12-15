<?php
  class AdminController {
    public function home() {
      require_once('views/admin/index.php');
    }

    public function error() {
      require_once('views/admin/error.php');
    }
  }
?>