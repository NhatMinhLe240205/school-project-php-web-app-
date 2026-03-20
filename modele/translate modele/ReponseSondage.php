<?php

class ReponseSondage
{
    private int $etudiant;
    private int $sondage;
    private string $reponse;

    // CONSTRUCTOR
    public function __construct(int $etudiant, int $sondage, string $reponse)
    {
        $this->etudiant = $etudiant;
        $this->sondage = $sondage;
        $this->reponse = $reponse;
    }

    // GETTERS AND SETTERS
    public function getEtudiant(): int
    {
        return $this->etudiant;
    }

    public function setEtudiant(int $etudiant): void
    {
        $this->etudiant = $etudiant;
    }

    public function getSondage(): int
    {
        return $this->sondage;
    }

    public function setSondage(int $sondage): void
    {
        $this->sondage = $sondage;
    }

    public function getReponse(): string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): void
    {
        $this->reponse = $reponse;
    }

    // TO STRING
    public function __toString(): string
    {
        return "ReponseSondage { etudiant={$this->etudiant}, sondage={$this->sondage}, reponse='{$this->reponse}' }";
    }
}
