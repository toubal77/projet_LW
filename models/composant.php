<?php
class Composant {
    public $idComposant;
    public $idIllustration;
    public $position_x;
    public $position_y;
    public $composant;

  //  public function __construct($idComposant, $idIllustration, $coordonnees, $description) {
   //     $this->idComposant = $idComposant;
   //     $this->idIllustration = $idIllustration;
   //     $this->coordonnees = $coordonnees;
    //    $this->description = $description;
   // }
   public function __construct() {

   }




   public function add($idILl, $description, $vecteur_y, $vecteur_x) {
    try {
        $db = Db::getInstance();
        
        $req = $db->prepare('INSERT INTO composant (idIllustration, description, vecteur_x, vecteur_y) VALUES (:idIll, :description, :vecteur_y, :vecteur_x)');
        
        $req->bindValue(':idIll', $idILl);
        $req->bindValue(':description', $description);
        $req->bindValue(':vecteur_y', $vecteur_y);
        $req->bindValue(':vecteur_x', $vecteur_x);
        $req->execute();
        
        return $req->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
        return false;
    }
}

    public static function getAll() {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM composant');
            $req->execute();
            $composants = $req->fetchAll(PDO::FETCH_ASSOC);
            return $composants;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }

    public static function find($compId,$illId) {

        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM composant WHERE idComposant = :compId ,idIllustration = :illId');
            $req->bindValue(':illId', $illId);
            $req->bindValue(':compId', $compId);
            $req->execute();
            $illustrations = $req->fetchAll(PDO::FETCH_ASSOC);
            return $illustrations;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public function getIdComposant() {
        return $this->idComposant;
    }

    public function setIdComposant($idComposant) {
        $this->idComposant = $idComposant;
    }

    public function getIdIllustration() {
        return $this->idIllustration;
    }

    public function setIdIllustration($idIllustration) {
        $this->idIllustration = $idIllustration;
    }

    public function getCoordonnees() {
        return $this->coordonnees;
    }

    public function setCoordonnees($coordonnees) {
        $this->coordonnees = $coordonnees;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}
?>
