<?php

require_once 'Personne.php';

class Etudiant extends Personne
{
    private int $sonGroupe;
    private int $sonParcours;
    private int $saFormation;

    private int $idEtudiant;
    private string $anneeUnivEtu;
    private int $promotion;
    private int $anneeFin;

    private bool $estApprenti = false;

    /** @var int[] */
    private array $covoiturage = [];

    private string $typeBac;

    public function __construct(
        int $idPersonne,
        int $idEtudiant,
        string $nomPersonne,
        string $prenomPersonne,
        string $addressePersonne,
        string $villePersonne,
        string $numTelPersonne,
        string $codePostal,
        string $emailPersonne,
        DateTime $dateNaissance,
        string $genre,
        string $passwordHash,
        string $anneeUnivEtu,
        int $promotion,
        int $anneeFin,
        string $typeBac
    ) {
        parent::__construct(
            $idPersonne,
            $nomPersonne,
            $prenomPersonne,
            $addressePersonne,
            $villePersonne,
            $numTelPersonne,
            $codePostal,
            $emailPersonne,
            $dateNaissance,
            $genre,
            $passwordHash
        );

        $this->idEtudiant   = $idEtudiant;
        $this->anneeUnivEtu = $anneeUnivEtu;
        $this->promotion   = $promotion;
        $this->anneeFin    = $anneeFin;
        $this->typeBac     = $typeBac;
    }

    public function viewInfo(): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function viewNote($matiere, $iut): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function viewSondageRepondu($sondage, $iut): void
    {
    }

    public function viewGroup($groupe): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function repondSondage($sondage): void
    {
        throw new Exception("Méthode non implémentée");
    }

    public function reportError(string $error): void
    {
        throw new Exception($error);
    }

    public function ajoutCovoiturage(int $etudiantId): void
    {
        $this->covoiturage[] = $etudiantId;
    }

    public function getSonGroupe(): int
    {
        return $this->sonGroupe;
    }

    public function setSonGroupe(int $sonGroupe): void
    {
        $this->sonGroupe = $sonGroupe;
    }

    public function getSonParcours(): int
    {
        return $this->sonParcours;
    }

    public function setSonParcours(int $sonParcours): void
    {
        $this->sonParcours = $sonParcours;
    }

    public function getSaFormation(): int
    {
        return $this->saFormation;
    }

    public function setSaFormation(int $saFormation): void
    {
        $this->saFormation = $saFormation;
    }

    public function getIdEtudiant(): int
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(int $idEtudiant): void
    {
        $this->idEtudiant = $idEtudiant;
    }

    public function getAnneeUnivEtu(): string
    {
        return $this->anneeUnivEtu;
    }

    public function setAnneeUnivEtu(string $anneeUnivEtu): void
    {
        $this->anneeUnivEtu = $anneeUnivEtu;
    }

    public function getPromotion(): int
    {
        return $this->promotion;
    }

    public function setPromotion(int $promotion): void
    {
        $this->promotion = $promotion;
    }

    public function getAnneeFin(): int
    {
        return $this->anneeFin;
    }

    public function setAnneeFin(int $anneeFin): void
    {
        $this->anneeFin = $anneeFin;
    }

    public function isEstApprenti(): bool
    {
        return $this->estApprenti;
    }

    public function setEstApprenti(bool $estApprenti): void
    {
        $this->estApprenti = $estApprenti;
    }

    public function getCovoiturage(): array
    {
        return $this->covoiturage;
    }

    public function setCovoiturage(array $covoiturage): void
    {
        $this->covoiturage = $covoiturage;
    }

    public function getTypeBac(): string
    {
        return $this->typeBac;
    }

    public function setTypeBac(string $typeBac): void
    {
        $this->typeBac = $typeBac;
    }

    public function __toString(): string
    {
        return "Etudiant {\n" .
            "  idEtudiant={$this->idEtudiant},\n" .
            "  anneeUnivEtu='{$this->anneeUnivEtu}',\n" .
            "  promotion={$this->promotion},\n" .
            "  anneeFin={$this->anneeFin},\n" .
            "  estApprenti=" . ($this->estApprenti ? 'true' : 'false') . ",\n" .
            "  typeBac='{$this->typeBac}',\n" .
            "  sonGroupe={$this->sonGroupe},\n" .
            "  sonParcours={$this->sonParcours},\n" .
            "  saFormation={$this->saFormation},\n" .
            "  covoiturage=" . json_encode($this->covoiturage) . ",\n" .
            "  personne=" . parent::__toString() . "\n" .
            "}";
    }
}
