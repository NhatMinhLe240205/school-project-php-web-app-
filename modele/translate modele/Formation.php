<?php

class Formation
{
    private int $idFormation;
    private string $nomFormation;

    // CONSTRUCTOR
    public function __construct(int $idFormation, string $nomFormation)
    {
        $this->idFormation = $idFormation;
        $this->nomFormation = $nomFormation;
    }

    // GETTERS AND SETTERS
    public function getIdFormation(): int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): void
    {
        $this->idFormation = $idFormation;
    }

    public function getNomFormation(): string
    {
        return $this->nomFormation;
    }

    public function setNomFormation(string $nomFormation): void
    {
        $this->nomFormation = $nomFormation;
    }
}