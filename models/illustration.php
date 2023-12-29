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
            
            $reqComp = $db->prepare('SELECT * FROM composant');
            $reqComp->execute();
            $composants = $reqComp->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($illustrations as &$ill) {
                $ill['composants'] = [];
                foreach ($composants as $comp) {
                    if ($comp['idIllustration'] == $ill['idIllustration']) {
                        $ill['composants'][] = $comp;
                    }
                }
            }
            return $illustrations;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }

    public static function deleteIllustration($illId) {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('DELETE FROM illustrations WHERE idIllustration = :illId');
            $req->bindValue(':illId', $illId);
            $req->execute();

            $reqComp = $db->prepare('DELETE FROM composant WHERE idIllustration = :illId');
            $reqComp->bindValue(':illId', $illId);
            $reqComp->execute();

           if($req){
            return true;
           }else{
            return false;
           }
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public static function find($illId) {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM illustrations WHERE idIllustration = :illId');
            $req->bindValue(':illId', $illId);
            $req->execute();
            $illustrations = $req->fetchAll(PDO::FETCH_ASSOC);

            // Récupérer les composants liés à l'illustration
            $reqComp = $db->prepare('SELECT * FROM composant WHERE idIllustration = :illId');
            $reqComp->bindValue(':illId', $illId);
            $reqComp->execute();
            $composants = $reqComp->fetchAll(PDO::FETCH_ASSOC);

            $illustrations['composants'] = $composants;
            return $illustrations;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }


    public static function findIll() {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT ill.*, comp.* FROM illustrations ill LEFT JOIN composant comp ON ill.idIllustration = comp.idIllustration WHERE ill.idUtilisateur = :idUtilisateur AND ill.titre = :titre');
            $req->bindValue(':idUtilisateur', $_SESSION['id']);
            $req->bindValue(':titre', $_SESSION['titre']);
            $req->execute();
    
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $illustrations = [];
            foreach ($result as $row) {
                $illId = $row['idIllustration'];
                if (!isset($illustrations[$illId])) {
                    $illustrations[$illId] = [
                        'idIllustration' => $row['idIllustration'],
                        'titre' => $row['titre'],
                        'langueParDefaut' => $row['langueParDefaut'],
                        'image' => $row['image'],
                        'description' => $row['description'],
                        'idUtilisateur' => $row['idUtilisateur'],
                        'composants' => []
                    ];
                }
    
                if ($row['idComposant']) {
                    $illustrations[$illId]['composants'][] = [
                        'idComposant' => $row['idComposant'],
                        'idIllustration' => $row['idIllustration'],
                        'composant' => $row['composant'],
                        'vecteur_x' => $row['vecteur_x'],
                        'vecteur_y' => $row['vecteur_y']
                    ];
                }
            }
    
            return array_values($illustrations);
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }
    
    

}
?>
