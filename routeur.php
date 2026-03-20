<?php
session_start();

// 1. TRAITEMENT DES ACTIONS (Avant l'affichage des pages)
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete-etudiant':
            if (isset($_GET['id'])) {
                require_once 'modele/etudiant.php';
                Etudiant::delete($_GET['id']);
                
                // On récupère le BUT actuel pour rediriger sur le bon onglet
                $but = isset($_GET['but']) ? $_GET['but'] : 1;
                header("Location: routeur.php?page=etudiants-groupes&but=" . $but);
                exit();
            }
            break;
            
        // Vous pourrez ajouter ici 'add-etudiant' ou 'edit-etudiant' plus tard
    }
}

// 2. LOGIQUE D'AFFICHAGE DES PAGES
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil-enseignant';

switch ($page) {
    case 'accueil-enseignant':
        include 'vue/accueilEnsRepFormation.html'; 
        break;

    case 'liste-enseignants':
        include 'vue/listeEnseignants.php';
        break;
        
    case 'etudiants-groupes':
        include 'vue/etudiantsGroupes.php';
        break;

    case 'deconnexion':
        session_destroy();
        header('Location: loginEns.html'); 
        exit();

    default:
        include 'vue/accueilEnsRepFormation.html';
        break;
}