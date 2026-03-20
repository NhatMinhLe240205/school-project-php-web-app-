<?php

class Groupe
{
    private int $sonParcours;
    private int $idGroupe;
    private string $nomGroupe;
    private int $nbrEtu;
    private bool $estAnglophone = false; // default, can change with setter
    private int $semestre;

    // CONSTRUCTOR
    public function __construct(int $idGroupe, string $nom, int $nbrEtu, int $semestre, int $sonParcours)
    {
        $this->idGroupe = $idGroupe;
        $this->nomGroupe = $nom;
        $this->nbrEtu = $nbrEtu;
        $this->semestre = $semestre;
        $this->sonParcours = $sonParcours;
    }

    // FUNCTIONS
    public function ajoutEtudiantGroup(Etudiant $etudiant): void
    {
        $etudiant->setSonGroupe($this->idGroupe);
    }

    public function enleverEtudiantGroup(Etudiant $etudiant): void
    {
        throw new Exception("Not implemented yet");
    }

    public function calculerMoyenne(Matiere $matiere): float
    {
        throw new Exception("Not implemented yet");
    }

    public function calculerEcartType(Matiere $matiere): float
    {
        throw new Exception("Not implemented yet");
    }

    public function compterGenre(string $genre): int
    {
        throw new Exception("Not implemented yet");
    }

    // GETTERS AND SETTERS
    public function getSonParcours(): int
    {
        return $this->sonParcours;
    }

    public function setSonParcours(int $sonParcours): void
    {
        $this->sonParcours = $sonParcours;
    }

    public function getIdGroupe(): int
    {
        return $this->idGroupe;
    }

    public function setIdGroupe(int $idGroupe): void
    {
        $this->idGroupe = $idGroupe;
    }

    public function getNomGroupe(): string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(string $nomGroupe): void
    {
        $this->nomGroupe = $nomGroupe;
    }

    public function getNbrEtu(): int
    {
        return $this->nbrEtu;
    }

    public function setNbrEtu(int $nbrEtu): void
    {
        $this->nbrEtu = $nbrEtu;
    }

    public function isEstAnglophone(): bool
    {
        return $this->estAnglophone;
    }

    public function setEstAnglophone(bool $estAnglophone): void
    {
        $this->estAnglophone = $estAnglophone;
    }

    public function getSemestre(): int
    {
        return $this->semestre;
    }

    public function setSemestre(int $semestre): void
    {
        $this->semestre = $semestre;
    }
}