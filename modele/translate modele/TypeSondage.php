<?php

class TypeSondage
{
    private string $idTypeSondage;
    private string $type;

    // CONSTRUCTOR
    public function __construct(string $idTypeSondage, string $type)
    {
        $this->idTypeSondage = $idTypeSondage;
        $this->type = $type;
    }

    // GETTERS AND SETTERS
    public function getIdTypeSondage(): string
    {
        return $this->idTypeSondage;
    }

    public function setIdTypeSondage(string $idTypeSondage): void
    {
        $this->idTypeSondage = $idTypeSondage;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    // TO STRING
    public function __toString(): string
    {
        return "TypeSondage { idTypeSondage='{$this->idTypeSondage}', type='{$this->type}' }";
    }
}
