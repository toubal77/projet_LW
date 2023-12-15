<?php
  require_once('connection.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    //page par defaut, apres faut verifie avec session_start etc si l'utilisateur si auth...
    $controller = 'auth';
    $action     = 'index';
  }

  require_once('views/layout.php');
?>