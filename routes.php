<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      default:
        $controller = new PagesController();
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show']);
/**
 * http://192.168.76.76/?controller=posts&action=index
 * constroller soit post ou pages
 * action soit index show
 */

  if (array_key_exists($controller, $controllers)) {
    echo "array exists";
    if (in_array($action, $controllers[$controller])) {
      echo "actions exists";
      call($controller, $action);
    } else {
      echo "don't exists";
      call('pages', 'error');
    }
  } else {
    echo "nothing exists";
    call('pages', 'error');
  }
?>