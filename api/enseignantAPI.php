<?php
// On définit que le fichier renvoie du JSON et non du HTML
header("Content-Type: application/json");
// On autorise d'autres domaines à lire l'API (utile pour le dev)
header("Access-Control-Allow-Origin: *");

require_once '../modele/enseignant.php';

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

try {
    if ($method === 'GET') {
        if ($id) {
            // Récupère un seul enseignant (Détails)
            $res = Enseignant::getById($id);
            echo json_encode($res ? $res : ["message" => "Enseignant non trouvé"]);
        } else {
            // Récupère toute la liste
            $liste = Enseignant::getAll();
            echo json_encode($liste);
        }
    } else {
        // Si on essaie de faire du POST/DELETE alors que ce n'est pas codé
        http_response_code(405);
        echo json_encode(["message" => "Méthode non autorisée"]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erreur" => $e->getMessage()]);
}
?>