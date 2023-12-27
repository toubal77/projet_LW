<?php
session_start();
require_once('connection.php');
class Illustration {
    public $idIllustration;
    public $titre;
    public $image;
    public $description;
    public $langueParDefaut;
    public $idUtilisateurs;

   // public function __construct($idIllustration, $titre, $format,$image, $langueParDefaut, $idUtilisateurs) {
    //    $this->idIllustration = $idIllustration;
    //    $this->titre = $titre;
    //    $this->format = $format;
    //    $this->image = $image;
    //    $this->langueParDefaut = $langueParDefaut;
    //    $this->idUtilisateurs = $idUtilisateurs;
    //}

    public function __construct() {

    }


    public function addIllus($titre, $langueParDefaut, $description, $image) {
        try {
            $db = Db::getInstance();
            
            $req = $db->prepare('INSERT INTO illustrations (titre, langueParDefaut, idUtilisateur,description, image) VALUES (:titre, :langueParDefaut, :idUtilisateur, :description, :image)');
            
            $req->bindValue(':titre', $titre);
            $req->bindValue(':langueParDefaut', $langueParDefaut);
            $req->bindValue(':description', $description);
            $req->bindValue(':idUtilisateur', $_SESSION['id']);
            $req->bindValue(':image', $image);
            $req->execute();
            
            return $req->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public static function getAllIllustrations() {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM illustrations');
            $req->execute();
            $illustrations = $req->fetchAll(PDO::FETCH_ASSOC);
            return $illustrations;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM illustration WHERE idIllustration = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $illustration = $req->fetch();

        if ($illustration) {
            return new Illustration(
                $illustration['idIllustration'],
                $illustration['titre'],
                $illustration['format'],
                $illustration['image'],
                $illustration['langue_par_defaut'],
                $illustration['idUtilisateurs']
            );
        } else {
            return null;
        }
    }

 public function getIdIllustration() {
    return $this->idIllustration;
}

public function setIdIllustration($idIllustration) {
    $this->idIllustration = $idIllustration;
}

public function getTitre() {
    return $this->titre;
}

public function setTitre($titre) {
    $this->titre = $titre;
}

public function getFormat() {
    return $this->format;
}

public function setFormat($format) {
    $this->format = $format;
}

public function getImage() {
    return $this->image;
}

public function setImage($image) {
    $this->image = $image;
}

public function getLangueParDefaut() {
    return $this->langueParDefaut;
}

public function setLangueParDefaut($langueParDefaut) {
    $this->langueParDefaut = $langueParDefaut;
}

public function getIdUtilisateurs() {
    return $this->idUtilisateurs;
}

public function setIdUtilisateurs($idUtilisateurs) {
    $this->idUtilisateurs = $idUtilisateurs;
}


}
?>
