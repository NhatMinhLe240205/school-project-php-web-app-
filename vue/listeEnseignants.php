<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Enseignants - IUT d'Orsay</title>
    <style>
        body, html {
            margin: 0;
            height: 100%;
            width: 100%;
            display: flex;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .side-menu {
            width: 220px;
            background-color: #d9d9d9;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .side-menu .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .side-menu .logo img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .side-menu .logo span {
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 0 10px;
        }

        .side-menu a {
            text-decoration: none;
            color: #333;
            padding: 12px 20px;
            display: block;
            transition: background 0.3s;
        }

        .side-menu a:hover {
            background-color: #b1afaf;
        }

        .side-menu a.active {
            background-color: #b1afaf;
            font-weight: bold;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: auto;
            position: relative;
        }

        /* Bandeau Titre Bleu */
        .header-blue {
            background-color: #c8c5b2ff;
            width: 80%;
            border-radius: 50px;
            padding: 20px;
            text-align: center;
            color: #79786fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .header-blue h1 { margin: 0; font-size: 28px; font-weight: bold; }

        /* Bouton Ajouter (+) */
        .btn-add {
            position: absolute;
            right: 5%;
            top: 40px;
            background-color: #837b55ff;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        /* Tableau */
        .table-container { width: 95%; background: white; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .teacher-table { width: 100%; border-collapse: collapse; }
        .teacher-table th { padding: 15px; text-align: left; color: #888; border-bottom: 1px solid #eee; text-transform: uppercase; font-size: 12px; }
        .teacher-table td { padding: 15px; border-bottom: 1px solid #f9f9f9; color: #333; }
        
        .actions { display: flex; gap: 10px; justify-content: flex-end; padding-right: 15px; }
        .icon-btn { text-decoration: none; font-size: 20px; }

        /* Box Détails PHP */
        .details-box {
            width: 80%;
            background: white;
            border: 2px solid #ffeaacff;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            body { flex-direction: column; }
            .side-menu { width: 100%; flex-direction: row; overflow-x: auto; }
            .side-menu .logo { display: none; }
        }
    </style>
</head>
<script>
function chargerEnseignants() {
    fetch('api/enseignantAPI.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('.teacher-table tbody');
            tbody.innerHTML = ''; // On vide le tableau actuel

            data.forEach(ens => {
                const row = `
                    <tr>
                        <td>${ens.nomP}</td>
                        <td>${ens.prenomP}</td>
                        <td>${ens.nomRole || 'Enseignant'}</td>
                        <td class="actions">
                            <a href="#" class="icon-btn" style="color:#5d8fff">ⓧ</a>
                            <a href="routeur.php?page=liste-enseignants&id_detail=${ens.idP}" class="icon-btn">📝</a>
                        </td>
                    </tr>`;
                tbody.innerHTML += row;
            });
        })
        .catch(error => console.error('Erreur API:', error));
}

// Optionnel : on peut appeler la fonction au clic sur un bouton "Actualiser"
</script>
<body>

    <div class="side-menu">
        <div class="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo">
            <span>Enseignant Resp. Formation</span>
        </div>
        <a href="routeur.php?page=accueil-enseignant">Accueil</a>
        <a href="routeur.php?page=profil-enseignant">Profil</a>
        <a href="routeur.php?page=sondages-enseignant">Sondages</a>
        <a href="routeur.php?page=etudiants-groupes">Étudiants et Groupes</a>
        <a href="routeur.php?page=liste-enseignants" class="active">Enseignants</a>
        <a href="routeur.php?page=deconnexion" style="margin-top: auto; color: #d9534f;">Déconnexion</a>
    </div>

    <div class="main-content">
        
        <div class="header-blue">
            <h1>Liste des enseignants</h1>
        </div>

        <a href="#" class="btn-add">+</a>

        <?php
        require_once 'modele/enseignant.php';

        // Affichage des détails si id_detail est dans l'URL
        if (isset($_GET['id_detail'])) {
            $details = Enseignant::getById($_GET['id_detail']);
            if ($details) {
                echo "<div class='details-box'>";
                echo "<h3>Détails : " . htmlspecialchars($details['nomP']) . " " . htmlspecialchars($details['prenomP']) . "</h3>";
                echo "Email : " . htmlspecialchars($details['emailP']) . "<br>";
                echo "Ville : " . htmlspecialchars($details['villeEtd'] ?? 'N/A');
                echo "<br><a href='routeur.php?page=liste-enseignants'>Fermer</a>";
                echo "</div>";
            }
        }
        ?>

        <div class="table-container">
            <table class="teacher-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Rôle</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    try {
        $liste = Enseignant::getAll();
        if ($liste) {
            foreach ($liste as $ens) : ?>
                <tr>
                    <td><?= htmlspecialchars($ens['nomP']) ?></td>
                    <td><?= htmlspecialchars($ens['prenomP']) ?></td>
                    <td><?= htmlspecialchars($ens['nomRole'] ?? 'Enseignant') ?></td>
                    <td class="actions">
                        <a href="#" class="icon-btn" style="color:#5d8fff">ⓧ</a>
                        <a href="routeur.php?page=liste-enseignants&id_detail=<?= $ens['idP'] ?>" class="icon-btn">📝</a>
                    </td>
                </tr>
            <?php endforeach;
        } else {
            echo "<tr><td colspan='4'>Aucun enseignant trouvé dans la base.</td></tr>";
        }
    } catch (Exception $e) {
        // CE MESSAGE TE DIRA EXACTEMENT QUELLE TABLE OU COLONNE POSE PROBLÈME
        echo "<tr><td colspan='4' style='color:red; padding:20px; background:#ffdce0;'>";
        echo "<strong>Détail technique de l'erreur :</strong><br>" . $e->getMessage();
        echo "</td></tr>";
    }
    ?>
</tbody>
            </table>
        </div>
    </div>
</body>
</html>