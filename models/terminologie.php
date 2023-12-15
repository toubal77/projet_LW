<?php
class Terminologie {
    public $idTerminologies;
    public $idComposant;
    public $langueParDefaut;
    public $traduction;

    public function __construct($idTerminologies, $idComposant, $langueParDefaut, $traduction) {
        $this->idTerminologies = $idTerminologies;
        $this->idComposant = $idComposant;
        $this->langueParDefaut = $langueParDefaut;
        $this->traduction = $traduction;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Terminologies');

        foreach ($req->fetchAll() as $terminologie) {
            $list[] = new Terminologie(
                $terminologie['idTerminologies'],
                $terminologie['idComposant'],
                $terminologie['langue_par_defaut'],
                $terminologie['traduction']
            );
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM Terminologies WHERE idTerminologies = :id');
        $req->execute(array('id' => $id));
        $terminologie = $req->fetch();

        return new Terminologie(
            $terminologie['idTerminologies'],
            $terminologie['idComposant'],
            $terminologie['langue_par_defaut'],
            $terminologie['traduction']
        );
    }

}
?>
