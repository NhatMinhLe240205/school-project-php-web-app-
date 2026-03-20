<?php
// api/index.php
header("Content-Type: application/json");
require_once '../config/connexion.php'; 
require_once 'EtudiantAPI.php'; 
Connexion::connect();
$db = Connexion::pdo();
$etudiantApi = new EtudiantAPI($db);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        if ($id) {
            echo json_encode($etudiantApi->getOne($id));
        } else {
            echo json_encode($etudiantApi->getAll());
        }
        break;
}