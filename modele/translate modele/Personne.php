<?php

abstract class Personne
{
    protected int $idPersonne;
    protected string $nomPersonne;
    protected string $prenomPersonne;
    protected string $adressePersonne;
    protected string $villePersonne;
    protected string $numeroTelPersonne;
    protected string $codePostal;
    protected string $emailPersonne;
    protected DateTime $dateNaissance;
    protected string $genre;
    protected string $passwordHash;

    // CONSTRUCTOR
    public function __construct(
        int $idPersonne,
        string $nomPersonne,
        string $prenomPersonne,
        string $adressePersonne,
        string $villePersonne,
        string $numeroTelPersonne,
        string $codePostal,
        string $emailPersonne,
        DateTime $dateNaissance,
        string $genre,
        string $passwordHash
    ) {
        $this->idPersonne = $idPersonne;
        $this->nomPersonne = $nomPersonne;
        $this->prenomPersonne = $prenomPersonne;
        $this->adressePersonne = $adressePersonne;
        $this->villePersonne = $villePersonne;
        $this->numeroTelPersonne = $numeroTelPersonne;
        $this->codePostal = $codePostal;
        $this->emailPersonne = $emailPersonne;
        $this->dateNaissance = $dateNaissance;
        $this->genre = $genre;
        $this->passwordHash = $passwordHash;
    }

    // GETTERS AND SETTERS
    public function getIdPersonne(): int { return $this->idPersonne; }
    public function setIdPersonne(int $idPersonne): void { $this->idPersonne = $idPersonne; }

    public function getNomPersonne(): string { return $this->nomPersonne; }
    public function setNomPersonne(string $nomPersonne): void { $this->nomPersonne = $nomPersonne; }

    public function getPrenomPersonne(): string { return $this->prenomPersonne; }
    public function setPrenomPersonne(string $prenomPersonne): void { $this->prenomPersonne = $prenomPersonne; }

    public function getAdressePersonne(): string { return $this->adressePersonne; }
    public function setAdressePersonne(string $adressePersonne): void { $this->adressePersonne = $adressePersonne; }

    public function getVillePersonne(): string { return $this->villePersonne; }
    public function setVillePersonne(string $villePersonne): void { $this->villePersonne = $villePersonne; }

    public function getNumeroTelPersonne(): string { return $this->numeroTelPersonne; }
    public function setNumeroTelPersonne(string $numeroTelPersonne): void { $this->numeroTelPersonne = $numeroTelPersonne; }

    public function getCodePostal(): string { return $this->codePostal; }
    public function setCodePostal(string $codePostal): void { $this->codePostal = $codePostal; }

    public function getEmailPersonne(): string { return $this->emailPersonne; }
    public function setEmailPersonne(string $emailPersonne): void { $this->emailPersonne = $emailPersonne; }

    public function getDateNaissance(): DateTime { return $this->dateNaissance; }
    public function setDateNaissance(DateTime $dateNaissance): void { $this->dateNaissance = $dateNaissance; }

    public function getGenre(): string { return $this->genre; }
    public function setGenre(string $genre): void { $this->genre = $genre; }

    public function getPasswordHash(): string { return $this->passwordHash; }
    public function setPasswordHash(string $passwordHash): void { $this->passwordHash = $passwordHash; }

    // TO STRING
    public function __toString(): string
    {
        return "Personne { idPersonne={$this->idPersonne}, nom='{$this->nomPersonne}', prenom='{$this->prenomPersonne}', adresse='{$this->adressePersonne}', ville='{$this->villePersonne}', tel='{$this->numeroTelPersonne}', codePostal='{$this->codePostal}', email='{$this->emailPersonne}', dateNaissance={$this->dateNaissance->format('Y-m-d')}, genre='{$this->genre}' }";
    }
}
