<?php
require_once __DIR__ . '/../config/connexion.php'; 

class Etudiant {
    public static function getByBUT($niveauBUT) {
        Connexion::connect();
        $db = Connexion::pdo();
        
        // Année de sortie pour un BUT3 actuel
        $anneeDiplomeBUT3 = 2025; 
        
        // Calcul dynamique :
        // Si BUT 3 -> 2025 + (3-3) = 2025
        // Si BUT 2 -> 2025 + (3-2) = 2026
        // Si BUT 1 -> 2025 + (3-1) = 2027
        $promotionCible = $anneeDiplomeBUT3 + (3 - $niveauBUT);

        $query = "SELECT p.idP, p.nomP, p.prenomP, g.nomG, e.promotion 
                  FROM Personne p 
                  JOIN Etudiant e ON p.idP = e.idP
                  JOIN Groupe g ON e.idG = g.idG
                  WHERE e.promotion = ? 
                  ORDER BY p.nomP ASC";
        
        $stmt = $db->prepare($query);
        $stmt->execute([$promotionCible]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($idP) {
        Connexion::connect();
        $db = Connexion::pdo();
        // Ordre crucial pour les clés étrangères
        $db->prepare("DELETE FROM Etudiant WHERE idP = ?")->execute([$idP]);
        return $db->prepare("DELETE FROM Personne WHERE idP = ?")->execute([$idP]);
    }
}