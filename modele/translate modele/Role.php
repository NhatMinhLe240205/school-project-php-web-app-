<?php

class Role
{
    private int $idRole;
    private string $nomRole;

    // CONSTRUCTOR
    public function __construct(int $idRole, string $nomRole)
    {
        $this->idRole = $idRole;
        $this->nomRole = $nomRole;
    }

    // GETTERS AND SETTERS
    public function getIdRole(): int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole): void
    {
        $this->idRole = $idRole;
    }

    public function getNomRole(): string
    {
        return $this->nomRole;
    }

    public function setNomRole(string $nomRole): void
    {
        $this->nomRole = $nomRole;
    }

    // TO STRING
    public function __toString(): string
    {
        return "Role { idRole={$this->idRole}, nomRole='{$this->nomRole}' }";
    }
}
