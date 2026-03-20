<?php

class ServiceChercher
{
    private IUT $iut;

    public function __construct(IUT $iut)
    {
        $this->iut = $iut;
    }

    public function chercherEtudiant(string $keyword): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function chercherEnseignant(string $keyword): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function chercherGroupe(string $keyword): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function findEnseignantId(int $id): Enseignant
    {
        foreach ($this->iut->getSesEnseignants() as $enseignant) {
            if ($enseignant->getIdEnseignant() === $id) {
                return $enseignant;
            }
        }
        throw new Exception("Enseignant non trouvé");
    }

    public function findErreurId(string $id): Erreur
    {
        foreach ($this->iut->getSesErreurs() as $erreur) {
            if ($erreur->getIdErreur() === $id) {
                return $erreur;
            }
        }
        throw new Exception("Erreur non trouvée");
    }

    public function findEtudiantId(int $id): Etudiant
    {
        foreach ($this->iut->getSesEtudiants() as $etudiant) {
            if ($etudiant->getIdEtudiant() === $id) {
                return $etudiant;
            }
        }
        throw new Exception("Etudiant non trouvé");
    }

    public function findFormationId(int $id): Formation
    {
        foreach ($this->iut->getSesFormations() as $formation) {
            if ($formation->getIdFormation() === $id) {
                return $formation;
            }
        }
        throw new Exception("Formation non trouvée");
    }

    public function findGroupeId(int $id): Groupe
    {
        foreach ($this->iut->getSesGroupes() as $groupe) {
            if ($groupe->getIdGroupe() === $id) {
                return $groupe;
            }
        }
        throw new Exception("Groupe non trouvé");
    }

    public function findMatiereId(int $id): Matiere
    {
        foreach ($this->iut->getSesMatieres() as $matiere) {
            if ($matiere->getIdMatiere() === $id) {
                return $matiere;
            }
        }
        throw new Exception("Matière non trouvée");
    }

    public function findNoteId(string $id, int $ide, int $idm): Note
    {
        foreach ($this->iut->getSesNotes() as $note) {
            if (
                $note->getIdNote() === $id &&
                $note->getSonEtudiant() === $ide &&
                $note->getSaMatiere() === $idm
            ) {
                return $note;
            }
        }
        throw new Exception("Note non trouvée");
    }

    public function findAllNoteId(int $ide): array
    {
        $notes = [];
        foreach ($this->iut->getSesNotes() as $note) {
            if ($note->getSonEtudiant() === $ide) {
                $notes[] = $note;
            }
        }
        return $notes;
    }

    public function findParcoursId(int $id): Parcours
    {
        foreach ($this->iut->getSesParcours() as $parcours) {
            if ($parcours->getIdParcours() === $id) {
                return $parcours;
            }
        }
        throw new Exception("Parcours non trouvé");
    }

    public function findReponseSondageId(int $ide, int $ids): ReponseSondage
    {
        foreach ($this->iut->getSesReponsesSondages() as $reponse) {
            if (
                $reponse->getEtudiant() === $ide &&
                $reponse->getSondage() === $ids
            ) {
                return $reponse;
            }
        }
        throw new Exception("Réponse sondage non trouvée");
    }

    public function findRoleId(int $id): Role
    {
        foreach ($this->iut->getSesRoles() as $role) {
            if ($role->getIdRole() === $id) {
                return $role;
            }
        }
        throw new Exception("Rôle non trouvé");
    }

    public function findSondageId(int $id): Sondage
    {
        foreach ($this->iut->getSesSondages() as $sondage) {
            if ($sondage->getIdSondage() === $id) {
                return $sondage;
            }
        }
        throw new Exception("Sondage non trouvé");
    }

    public function findTypeSondageId(int $id): TypeSondage
    {
        foreach ($this->iut->getSesTypesSondages() as $type) {
            if ($type->getIdTypeSondage() === $id) {
                return $type;
            }
        }
        throw new Exception("Type de sondage non trouvé");
    }
}
