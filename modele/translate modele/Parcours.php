<?php

class Parcours
{
    private int $idParcours;
    private string $nomParcours;
    private int $nbrEtuParcours;

    // CONSTRUCTOR
    public function __construct(int $idParcours, string $nomParcours, int $nbrEtuParcours)
    {
        $this->idParcours = $idParcours;
        $this->nomParcours = $nomParcours;
        $this->nbrEtuParcours = $nbrEtuParcours;
    }

    // GETTERS AND SETTERS
    public function getIdParcours(): int
    {
        return $this->idParcours;
    }

    public function setIdParcours(int $idParcours): void
    {
        $this->idParcours = $idParcours;
    }

    public function getNomParcours(): string
    {
        return $this->nomParcours;
    }

    public function setNomParcours(string $nomParcours): void
    {
        $this->nomParcours = $nomParcours;
    }

    public function getNbrEtuParcours(): int
    {
        return $this->nbrEtuParcours;
    }

    public function setNbrEtuParcours(int $nbrEtuParcours): void
    {
        $this->nbrEtuParcours = $nbrEtuParcours;
    }
}
