<?php
// modele/erreur.php
require_once __DIR__ . '/../config/connexion.php'; 

class Erreur {

    public static function getAll() {
        $db = Connexion::pdo();
        $stmt = $db->query("SELECT * FROM Erreur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($idErreur) {
        $db = Connexion::pdo();
        $stmt = $db->prepare("SELECT * FROM Erreur WHERE idErreur = ?");
        $stmt->execute([$idErreur]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($sonEtudiant, $messageErreur) {
        $db = Connexion::pdo();
        $stmt = $db->prepare("INSERT INTO Erreur (sonEtudiant, messageErreur) VALUES (?, ?)");
        return $stmt->execute([$sonEtudiant, $messageErreur]);
    }

    public static function delete($idErreur) {
        $db = Connexion::pdo();
        $stmt = $db->prepare("DELETE FROM Erreur WHERE idErreur = ?");
        return $stmt->execute([$idErreur]);
    }
}