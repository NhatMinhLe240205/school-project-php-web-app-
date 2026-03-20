<?php
// modele/enseignant.php
require_once __DIR__ . '/../config/connexion.php'; 

class Enseignant {

    public static function getConnection() {
        Connexion::connect(); 
        return Connexion::pdo(); 
    }

    public static function getAll() {
        $db = self::getConnection();
        if ($db == null) throw new Exception("Connexion PDO nulle");

        // Correction des noms de tables selon ton schéma :
        // roleEnseignant (r minuscule) et Role (R majuscule)
        $query = "SELECT p.idP, p.nomP, p.prenomP, r.nomRole 
                  FROM Personne p 
                  JOIN Enseignant e ON p.idP = e.idP
                  LEFT JOIN roleEnseignant re ON e.idEs = re.idEs
                  LEFT JOIN Role r ON re.idRole = r.idRole
                  ORDER BY p.nomP ASC";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = self::getConnection();
        $query = "SELECT p.*, r.nomRole 
                  FROM Personne p 
                  JOIN Enseignant e ON p.idP = e.idP 
                  LEFT JOIN roleEnseignant re ON e.idEs = re.idEs
                  LEFT JOIN Role r ON re.idRole = r.idRole
                  WHERE p.idP = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}