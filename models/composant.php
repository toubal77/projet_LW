<?php
class Composant {
    public $idComposant;
    public $idIllustration;
    public $position_x;
    public $position_y;
    public $composant;

   public function __construct() {

   }

   public function add($idILl, $description, $vecteur_y, $vecteur_x) {
    try {
        $db = Db::getInstance();
        
        $req = $db->prepare('INSERT INTO composant (idIllustration, composant, vecteur_x, vecteur_y) VALUES (:idIll, :description, :vecteur_y, :vecteur_x)');
        
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

}
?>
