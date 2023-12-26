<?php
class Composant {
    public $idComposant;
    public $idIllustration;
    public $coordonnees;
    public $description;

  //  public function __construct($idComposant, $idIllustration, $coordonnees, $description) {
   //     $this->idComposant = $idComposant;
   //     $this->idIllustration = $idIllustration;
   //     $this->coordonnees = $coordonnees;
    //    $this->description = $description;
   // }
   public function __construct() {

   }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Composant');

        foreach ($req->fetchAll() as $composant) {
            $list[] = new Composant(
                $composant['idComposant'],
                $composant['idIllustration'],
                $composant['coordonnees'],
                $composant['description']
            );
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM Composant WHERE idComposant = :id');
        $req->execute(array('id' => $id));
        $composant = $req->fetch();

        return new Composant(
            $composant['idComposant'],
            $composant['idIllustration'],
            $composant['coordonnees'],
            $composant['description']
        );
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
