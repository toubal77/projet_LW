<?php
session_start();
require_once('models/illustration.php');
  class PostsController {
    public function index() {
      // we store all the posts in a variable
     // $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function create() {
      if(!isset($_SESSION['user'])){
        header("Location: /project_LW/auth/index");
      }
      if(isset($_POST["submitForm"])){

           $this->illustration = new Illustration();
        if (isset($_POST['titre']) && isset($_POST['format']) &&isset($_POST['langueParDefaut'])&& isset($_POST['description'])  &&isset($_FILES['svgImage'])){
            $titre = $_POST['titre'];
            $format = $_POST['format'];
            $description = $_POST['description'];
            $langueParDefaut = $_POST['langueParDefaut'];
            $svgImage = $_FILES['svgImage'];

            $formatsAutorises = ['image/png', 'image/jpg', 'image/jpeg', 'image/svg+xml'];
            if (!in_array($svgImage['type'], $formatsAutorises)) {
              echo '<script>';
              echo 'alert("Le format de la photo n\'est pas autorisé. Veuillez choisir une photo au format PNG, JPG, JPEG ou SVG");';
              echo 'window.location.href = "/project_LW/posts/create";'; 
              echo '</script>';
            } else {

            
            $illustration = $this->illustration->addIllus($titre, $format,$langueParDefaut, $description, $svgImage);
       
           if ($illustration) {
            echo '<script>';
            echo 'alert("Illustration ajouter avec succès");';
            echo 'window.location.href = "/project_LW/posts/index";'; 
            echo '</script>';
           } else {
            echo '<script>';
            echo 'alert("Erreur lors de création d\'une illustration. Réessayer");';
            echo 'window.location.href = "/project_LW/posts/create";'; 
            echo '</script>';
           }
          }
        } else {
          echo '<script>';
          echo 'alert("Veuillez remplir tous les champs du formulaire");';
          echo 'window.location.href = "/project_LW/posts/create";'; 
          echo '</script>';
        }
      }else{
        require_once('views/posts/create.php');
      }
      
    }

    public function show() {
        require_once('views/posts/show.php');
    }
  }
?>