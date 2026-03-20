<?php
require_once 'modele/etudiant.php';
$but_selectionne = $_GET['but'] ?? 1;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Étudiants - IUT d'Orsay</title>
    <style>
        body, html { margin: 0; height: 100%; width: 100%; display: flex; font-family: Arial, sans-serif; background-color: #f0f2f5; }
        .side-menu { width: 220px; background-color: #d9d9d9; display: flex; flex-direction: column; padding-top: 20px; box-shadow: 2px 0 6px rgba(0,0,0,0.2); }
        .side-menu a { text-decoration: none; color: #333; padding: 12px 20px; display: block; }
        .side-menu a.active { background-color: #b1afaf; font-weight: bold; }

        .main-content { flex: 1; padding: 30px; display: flex; flex-direction: column; align-items: center; }
        
        .toolbar { width: 95%; display: flex; justify-content: space-between; align-items: flex-end; }
        .tabs { display: flex; gap: 5px; }
        .tab-btn { padding: 10px 30px; border: none; border-radius: 10px 10px 0 0; font-weight: bold; cursor: pointer; text-decoration: none; }
        
        .but1 { background-color: #c8f2b1; color: black; }
        .but2 { background-color: #6a8e4e; color: white; }
        .but3 { background-color: #3e5c2a; color: white; }
        .active-tab { border: 2px solid #333; border-bottom: none; }

        .table-container { width: 95%; background: white; border-radius: 0 10px 10px 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .student-table { width: 100%; border-collapse: collapse; }
        .student-table thead tr { background-color: #a6a6a6; }
        .student-table th { padding: 15px; text-align: left; }
        
        .student-table tbody tr:nth-child(odd) { background-color: #e2f7d5; }
        .student-table tbody tr:nth-child(even) { background-color: #c8f2b1; }
        .student-table td { padding: 12px 15px; border-bottom: 1px solid #fff; }

        .actions { display: flex; gap: 15px; justify-content: flex-end; align-items: center; }
        .actions a { text-decoration: none; color: #333; font-size: 18px; }
        .btn-add { background: #6a8e4e; color: white; width: 50px; height: 50px; border-radius: 10px; display: flex; justify-content: center; align-items: center; text-decoration: none; font-size: 30px; }
    </style>
</head>
<script>
let butActuel = 1;

// 1. CHARGER LES DONNÉES
function chargerEtudiants(but = 1) {
    butActuel = but;
    // On change l'apparence des onglets
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active-tab'));
    document.querySelector('.but' + but).classList.add('active-tab');

    fetch(`api/etudiantAPI.php?but=${but}`)
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector('.student-table tbody');
            tbody.innerHTML = ''; 

            data.forEach(etd => {
                tbody.innerHTML += `
                    <tr id="row-${etd.idP}">
                        <td>${etd.prenomP} <strong>${etd.nomP.toUpperCase()}</strong></td>
                        <td>${etd.nomG}</td>
                        <td class="actions">
                            <a href="#" onclick="supprimerEtudiant(${etd.idP})">ⓧ</a>
                            <a href="#">📝</a>
                            <a href="#" class="btn-consulter">Consulter</a>
                        </td>
                    </tr>`;
            });
        });
}

// 2. SUPPRIMER VIA L'API
function supprimerEtudiant(id) {
    if(!confirm("Supprimer cet étudiant ?")) return;

    fetch(`api/etudiantAPI.php?id=${id}`, { method: 'DELETE' })
        .then(res => res.json())
        .then(res => {
            if(res.success) {
                // On retire la ligne du tableau sans recharger la page !
                document.getElementById('row-' + id).remove();
            }
        });
}

// Lancement au chargement de la page
window.onload = () => chargerEtudiants(1);
</script>
<body>

    <div class="side-menu">
        <a href="routeur.php?page=accueil-enseignant">Accueil</a>
        <a href="routeur.php?page=etudiants-groupes" class="active">Étudiants et Groupes</a>
        <a href="routeur.php?page=liste-enseignants">Enseignants</a>
    </div>

    <div class="main-content">
        <div class="toolbar">
            <div class="tabs">
                <a href="routeur.php?page=etudiants-groupes&but=1" class="tab-btn but1 <?= $but_selectionne == 1 ? 'active-tab' : '' ?>">BUT 1</a>
                <a href="routeur.php?page=etudiants-groupes&but=2" class="tab-btn but2 <?= $but_selectionne == 2 ? 'active-tab' : '' ?>">BUT 2</a>
                <a href="routeur.php?page=etudiants-groupes&but=3" class="tab-btn but3 <?= $but_selectionne == 3 ? 'active-tab' : '' ?>">BUT 3</a>
            </div>
            <div style="display:flex; gap:10px; align-items:center;">
                <select style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;"><option>Informatique</option></select>
                <a href="#" class="btn-add">+</a>
            </div>
        </div>

        <div class="table-container">
            <table class="student-table">
                <thead>
                    <tr><th>Prénom / Nom de Famille</th><th>Groupes</th><th style="text-align: right; padding-right: 40px;">Actions</th></tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $liste = Etudiant::getByBUT($but_selectionne);
                        foreach ($liste as $etd) : ?>
                            <tr>
                                <td><?= htmlspecialchars($etd['prenomP']) ?> <strong><?= htmlspecialchars(strtoupper($etd['nomP'])) ?></strong></td>
                                <td><?= htmlspecialchars($etd['nomG']) ?></td>
                                <td class="actions">
                                    <a href="routeur.php?action=delete-etudiant&id=<?= $etd['idP'] ?>&but=<?= $but_selectionne ?>" onclick="return confirm('Supprimer ?')">ⓧ</a>
                                    <a href="#">📝</a>
                                    <a href="#" style="font-weight:bold; font-size:12px;">Consulter</a>
                                </td>
                            </tr>
                        <?php endforeach;
                    } catch (Exception $e) { echo "<tr><td colspan='3'>Erreur : ".$e->getMessage()."</td></tr>"; }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>