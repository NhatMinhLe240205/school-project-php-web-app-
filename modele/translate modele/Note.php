<?php

class Note
{
    private int $sonEtudiant; 
    private int $saMatiere;
    private float $note;
    private float $pourcentage;
    private string $idNote;

    // CONSTRUCTOR
    public function __construct(int $sonEtudiant, int $saMatiere, float $note, float $pourcentage, string $idNote)
    {
        $this->sonEtudiant = $sonEtudiant;
        $this->saMatiere = $saMatiere;
        $this->note = $note;
        $this->pourcentage = $pourcentage;
        $this->idNote = $idNote;
    }

    // GETTERS AND SETTERS
    public function getSonEtudiant(): int
    {
        return $this->sonEtudiant;
    }

    public function setSonEtudiant(int $sonEtudiant): void
    {
        $this->sonEtudiant = $sonEtudiant;
    }

    public function getSaMatiere(): int
    {
        return $this->saMatiere;
    }

    public function setSaMatiere(int $saMatiere): void
    {
        $this->saMatiere = $saMatiere;
    }

    public function getNote(): float
    {
        return $this->note;
    }

    public function setNote(float $note): void
    {
        $this->note = $note;
    }

    public function getPourcentage(): float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): void
    {
        $this->pourcentage = $pourcentage;
    }

    public function getIdNote(): string
    {
        return $this->idNote;
    }

    public function setIdNote(string $idNote): void
    {
        $this->idNote = $idNote;
    }
}
