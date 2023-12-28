<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      case 'auth':
        $controller = new AuthController();
      break;
      case 'admin':
        $controller = new AdminController();
      break;
      default:
        $controller = new AuthCOntroller();
    }

    $controller->{ $action }();
  }


$controllers = array(
  'auth' => ['index', 'signUp','logout'],
  'posts' => ['index', 'create'],
  'admin' => ['index', 'show','createUser','consulteUser','show']
);

$requestURI = $_SERVER['REQUEST_URI'];

$uriParts = explode('/', $requestURI);

$uriParts = array_filter($uriParts);

$projectDirectory = array_shift($uriParts);

$controller = array_shift($uriParts);
$action = array_shift($uriParts);

$controller = !empty($controller) ? $controller : 'auth';
$action = !empty($action) ? $action : 'index';

if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
  call($controller, $action);
}
?>