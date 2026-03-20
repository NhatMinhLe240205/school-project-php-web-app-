<?php

require_once 'Personne.php';

class Enseignant extends Personne
{
    private array $sesMatiere = [];
    private array $sesRoles = [];
    private array $sesFormationEnseigne = [];
    private int $idEnseignant;

    public function __construct(
        int $idPersonne,
        int $idEnseignant,
        string $nomPersonne,
        string $prenomPersonne,
        string $addressePersonne,
        string $villePersonne,
        string $numTelPersonne,
        string $codePostal,
        string $emailPersonne,
        DateTime $dateNaissance,
        string $genre,
        string $passwordHash
    ) {
        parent::__construct(
            $idPersonne,
            $nomPersonne,
            $prenomPersonne,
            $addressePersonne,
            $villePersonne,
            $numTelPersonne,
            $codePostal,
            $emailPersonne,
            $dateNaissance,
            $genre,
            $passwordHash
        );

        $this->idEnseignant = $idEnseignant;
    }

    public function viewEtudiant(Etudiant $etudiant): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function viewGroup($groupe): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function viewEnseignant(Enseignant $enseignant): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function viewSondage($sondage): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function permet($role): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function ajoutCovoiturage(Etudiant $etudiant, Etudiant $covoiturage): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function getSesMatiere(): array
    {
        return $this->sesMatiere;
    }

    public function setSesMatiere(array $sesMatiere): void
    {
        $this->sesMatiere = $sesMatiere;
    }

    public function getSesRoles(): array
    {
        return $this->sesRoles;
    }

    public function setSesRoles(array $sesRoles): void
    {
        $this->sesRoles = $sesRoles;
    }

    public function getSesFormationEnseigne(): array
    {
        return $this->sesFormationEnseigne;
    }

    public function setSesFormationEnseigne(array $sesFormationEnseigne): void
    {
        $this->sesFormationEnseigne = $sesFormationEnseigne;
    }

    public function getIdEnseignant(): int
    {
        return $this->idEnseignant;
    }

    public function setIdEnseignant(int $idEnseignant): void
    {
        $this->idEnseignant = $idEnseignant;
    }

    public function __toString(): string
    {
        return "Enseignant {\n" .
            "  idEnseignant={$this->idEnseignant},\n" .
            "  roles=" . json_encode($this->sesRoles) . ",\n" .
            "  matieres=" . json_encode($this->sesMatiere) . ",\n" .
            "  formationsEnseigne=" . json_encode($this->sesFormationEnseigne) . ",\n" .
            "  " . parent::__toString() . "\n" .
            "}";
    }
}
