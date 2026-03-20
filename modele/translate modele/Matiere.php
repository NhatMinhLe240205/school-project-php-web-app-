<?php

class Matiere
{
    private int $idMatiere;
    private string $nomMatiere;

    // CONSTRUCTOR
    public function __construct(int $idMatiere, string $nomMatiere)
    {
        $this->idMatiere = $idMatiere;
        $this->nomMatiere = $nomMatiere;
    }

    // GETTERS AND SETTERS
    public function getIdMatiere(): int
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(int $idMatiere): void
    {
        $this->idMatiere = $idMatiere;
    }

    public function getNomMatiere(): string
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(string $nomMatiere): void
    {
        $this->nomMatiere = $nomMatiere;
    }
}
