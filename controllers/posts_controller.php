<?php
session_start();
require_once('models/illustration.php');
require_once('models/composant.php');
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
          $this->composants = new Composant();

          if (isset($_POST['position_y']) && isset($_POST['position_x']) && isset($_POST['composant'])) { 
            $position_y = $_POST['position_y'];
            $position_x = $_POST['position_x'];
            $composant = $_POST['composant'];
            $composants = $this->composants->add($_SESSION['idIll'],$composant,$position_y,$position_x);
            
            if ($composants) {
              echo '<script>';
              echo 'alert("Composants ajouter avec succès");';
             echo 'window.location.href = "/project_LW/posts/show";'; 
              echo '</script>';
            } else {
              echo '<script>';
              echo 'alert("Erreur lors de création d\'une Composants. Réessayer");';
             echo 'window.location.href = "/project_LW/posts/create";'; 
              echo '</script>';
            }
          } 
          $illustration = $this->illustrations->findIll();
         $_SESSION['idIll'] = $illustration[0]['idIllustration']; 
         if($illustration){
            require_once('views/posts/show.php');
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