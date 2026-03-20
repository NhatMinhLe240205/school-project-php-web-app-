<?php
header("Content-Type: application/json");
require_once '../modele/etudiant.php';

$method = $_SERVER['REQUEST_METHOD'];

try {
    if ($method === 'GET') {
        $but = $_GET['but'] ?? 1;
        echo json_encode(Etudiant::getByBUT($but));
    } 
    elseif ($method === 'DELETE') {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $success = Etudiant::delete($id);
            echo json_encode(["success" => $success]);
        }
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}