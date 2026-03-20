<?php

class IUT
{
    private array $sesEnseignants;
    private array $sesErreurs;
    private array $sesEtudiants;
    private array $sesFormations;
    private array $sesGroupes;
    private array $sesMatieres;
    private array $sesNotes;
    private array $sesParcours;
    private array $sesReponsesSondages;
    private array $sesRoles;
    private array $sesSondages;
    private array $sesTypesSondages;

    // CONSTRUCTOR
    public function __construct()
    {
        $this->sesEnseignants = [];
        $this->sesErreurs = [];
        $this->sesEtudiants = [];
        $this->sesFormations = [];
        $this->sesGroupes = [];
        $this->sesMatieres = [];
        $this->sesNotes = [];
        $this->sesParcours = [];
        $this->sesReponsesSondages = [];
        $this->sesRoles = [];
        $this->sesSondages = [];
        $this->sesTypesSondages = [];
    }

    // GETTERS AND SETTERS
    public function getSesEnseignants(): array { return $this->sesEnseignants; }
    public function setSesEnseignants(array $sesEnseignants): void { $this->sesEnseignants = $sesEnseignants; }

    public function getSesErreurs(): array { return $this->sesErreurs; }
    public function setSesErreurs(array $sesErreurs): void { $this->sesErreurs = $sesErreurs; }

    public function getSesEtudiants(): array { return $this->sesEtudiants; }
    public function setSesEtudiants(array $sesEtudiants): void { $this->sesEtudiants = $sesEtudiants; }

    public function getSesFormations(): array { return $this->sesFormations; }
    public function setSesFormations(array $sesFormations): void { $this->sesFormations = $sesFormations; }

    public function getSesGroupes(): array { return $this->sesGroupes; }
    public function setSesGroupes(array $sesGroupes): void { $this->sesGroupes = $sesGroupes; }

    public function getSesMatieres(): array { return $this->sesMatieres; }
    public function setSesMatieres(array $sesMatieres): void { $this->sesMatieres = $sesMatieres; }

    public function getSesNotes(): array { return $this->sesNotes; }
    public function setSesNotes(array $sesNotes): void { $this->sesNotes = $sesNotes; }

    public function getSesParcours(): array { return $this->sesParcours; }
    public function setSesParcours(array $sesParcours): void { $this->sesParcours = $sesParcours; }

    public function getSesReponsesSondages(): array { return $this->sesReponsesSondages; }
    public function setSesReponsesSondages(array $sesReponsesSondages): void { $this->sesReponsesSondages = $sesReponsesSondages; }

    public function getSesRoles(): array { return $this->sesRoles; }
    public function setSesRoles(array $sesRoles): void { $this->sesRoles = $sesRoles; }

    public function getSesSondages(): array { return $this->sesSondages; }
    public function setSesSondages(array $sesSondages): void { $this->sesSondages = $sesSondages; }

    public function getSesTypesSondages(): array { return $this->sesTypesSondages; }
    public function setSesTypesSondages(array $sesTypesSondages): void { $this->sesTypesSondages = $sesTypesSondages; }
}
