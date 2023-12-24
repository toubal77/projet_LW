<?php
class Illustration {
    public $idIllustration;
    public $titre;
    public $format;
    public $image;
    public $langueParDefaut;
    public $idUtilisateurs;

    public function __construct($idIllustration, $titre, $format,$image, $langueParDefaut, $idUtilisateurs) {
        $this->idIllustration = $idIllustration;
        $this->titre = $titre;
        $this->format = $format;
        $this->image = $image;
        $this->langueParDefaut = $langueParDefaut;
        $this->idUtilisateurs = $idUtilisateurs;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM illustration');

        foreach ($req->fetchAll() as $illustration) {
            $list[] = new Illustration(
                $illustration['idIllustration'],
                $illustration['titre'],
                $illustration['format'],
                $illustration['image'],
                $illustration['langue_par_defaut'],
                $illustration['idUtilisateurs']
            );
        }

        return $list;
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
