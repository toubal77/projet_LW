<?php
session_start();
  class AdminController {
    public function index() {
      require_once('views/admin/index.php');
    }

    public function error() {
      require_once('views/admin/error.php');
    }
  }
?>