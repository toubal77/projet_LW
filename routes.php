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

// we're adding an entry for the new controller and its actions
$controllers = array(
  'auth' => ['index', 'signUp'],
  'posts' => ['index', 'create','show'],
  'admin' => ['index', 'show']
);

// Get the request URI
$requestURI = $_SERVER['REQUEST_URI'];
// Split the URI into parts
$uriParts = explode('/', $requestURI);

// Remove empty elements
$uriParts = array_filter($uriParts);

// Remove the project base directory
$projectDirectory = array_shift($uriParts);

// Extract the controller and action from the remaining URI parts
$controller = array_shift($uriParts);
$action = array_shift($uriParts);

// Handle the case where controller or action is not specified
$controller = !empty($controller) ? $controller : 'auth';
$action = !empty($action) ? $action : 'index';


// Call the appropriate controller and action
if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
  call($controller, $action);
}
?>