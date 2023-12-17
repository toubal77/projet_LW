<?php
  class PagesController {
    public function index() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('views/pages/index.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>