<?php

class Sondage
{
    private int $idSondage;
    private int $sonEnseignant;
    private string $sonType;
    private string $nomSondage;
    private string $questions;

    // CONSTRUCTOR
    public function __construct(int $idSondage, int $sonEnseignant, string $sonType, string $nomSondage, string $questions)
    {
        $this->idSondage = $idSondage;
        $this->sonEnseignant = $sonEnseignant;
        $this->sonType = $sonType;
        $this->nomSondage = $nomSondage;
        $this->questions = $questions;
    }

    // GETTERS AND SETTERS
    public function getIdSondage(): int
    {
        return $this->idSondage;
    }

    public function setIdSondage(int $idSondage): void
    {
        $this->idSondage = $idSondage;
    }

    public function getSonEnseignant(): int
    {
        return $this->sonEnseignant;
    }

    public function setSonEnseignant(int $sonEnseignant): void
    {
        $this->sonEnseignant = $sonEnseignant;
    }

    public function getSonType(): string
    {
        return $this->sonType;
    }

    public function setSonType(string $sonType): void
    {
        $this->sonType = $sonType;
    }

    public function getNomSondage(): string
    {
        return $this->nomSondage;
    }

    public function setNomSondage(string $nomSondage): void
    {
        $this->nomSondage = $nomSondage;
    }

    public function getQuestions(): string
    {
        return $this->questions;
    }

    public function setQuestions(string $questions): void
    {
        $this->questions = $questions;
    }

    // TO STRING
    public function __toString(): string
    {
        return "Sondage { idSondage={$this->idSondage}, sonEnseignant={$this->sonEnseignant}, sonType='{$this->sonType}', nomSondage='{$this->nomSondage}', questions='{$this->questions}' }";
    }
}
