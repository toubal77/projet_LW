<?php
session_start();
require_once('models/illustration.php');
  class PostsController {
    public function index() {
      $this->illustration = new Illustration();
      $illustrations = $this->illustration->getAllIllustrations();
      require_once('views/posts/index.php');
    }
 
    public function create() {
      if(!isset($_SESSION['user'])){
        header("Location: /project_LW/auth/index");
      }
      if(isset($_POST["submitForm"])){
           $this->illustration = new Illustration();
        if (isset($_POST['titre']) && isset($_POST['langueParDefaut'])&& isset($_POST['description'])  &&isset($_POST['svgImage'])){ 
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $langueParDefaut = $_POST['langueParDefaut'];
            $svgImage = $_POST['svgImage'];
            $checkExt = fileExtension($_POST['svgImage']);
            if (!$checkExt) {
              echo '<script>';
              echo 'alert("Le format de la photo n\'est pas autorisé. Veuillez choisir une photo au format PNG, JPG, JPEG ou SVG");';
              echo 'window.location.href = "/project_LW/posts/create";'; 
              echo '</script>';
            } else {
              $illustration = $this->illustration->addIllus($titre, $langueParDefaut, $description, $svgImage);

           if ($illustration) {
            $_SESSION['titre'] = $titre;
            echo '<script>';
            echo 'alert("Illustration ajouter avec succès");';
            echo 'window.location.href = "/project_LW/posts/show";'; 
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
          $this->illustrations = new Illustration();
          $illustration = $this->illustrations->findIll();
          if($illustration){
            require_once('views/posts/show.php');
          }else{
          echo '<script>';
          echo 'alert("Une erreur est survenue. Réessayer plus tard");';
          echo 'window.location.href = "/project_LW/admin/index";'; 
          echo '</script>';
        }

    }
  }

  function fileExtension($filename) {
    $formatsAut = ['.png', '.jpg', '.jpeg', '.svg'];
    foreach ($formatsAut as $extensionAut) {
        $check = strpos($filename, $extensionAut);
        if ($check !== false) {
            return true;
        }
    }
    return false;
}
?>