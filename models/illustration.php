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
            return $illustrations;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }


    public static function findIll() {
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM illustrations WHERE idUtilisateur = :idUtilisateur AND titre= :titre');
            $req->bindValue(':idUtilisateur', $_SESSION['id']);
            $req->bindValue(':titre', $_SESSION['titre']);
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
