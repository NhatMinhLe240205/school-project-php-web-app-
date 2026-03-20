<?php

class ServicePersonne
{
    private IUT $iut;

    public function __construct(IUT $iut)
    {
        $this->iut = $iut;
    }

    public function creerEtudiant(
        string $nom,
        string $prenom,
        string $adresse,
        string $ville,
        string $numTel,
        string $cp,
        string $email,
        DateTime $dateNaissance,
        string $genre,
        string $hashPass,
        string $typeBac,
        string $anneeUnivEtu,
        int $promotion,
        int $anneeFin,
        int $estApprenti
    ): Etudiant {
        try {
            $data = [
                'nomPersonne'       => $nom,
                'prenomPersonne'    => $prenom,
                'adressePersonne'   => $adresse,
                'villePersonne'     => $ville,
                'numeroTelPersonne' => $numTel,
                'codePostal'        => $cp,
                'emailPersonne'     => $email,
                'dateNaissance'     => $dateNaissance->format('Y-m-d'),
                'genre'             => $genre,
                'passwordHash'      => $hashPass,
                'anneeUnivEtu'       => $anneeUnivEtu,
                'promotion'         => $promotion,
                'anneeFin'          => $anneeFin,
                'estApprenti'        => $estApprenti,
                'typeBac'            => $typeBac,
                'saFormation'        => 1,
                'sonParcours'        => 1,
                'sonGroupe'          => 1,
                'covoiturage'        => []
            ];

            $response = ApiClient::post('etudiant', json_encode($data));
            $result = json_decode($response, true);

            $etudiant = new Etudiant(
                $result['idPersonne'],
                $result['idEtudiant'],
                $nom,
                $prenom,
                $adresse,
                $ville,
                $numTel,
                $cp,
                $email,
                $dateNaissance,
                $genre,
                $hashPass,
                $anneeUnivEtu,
                $promotion,
                $anneeFin,
                $typeBac
            );

            $etudiant->setSaFormation(1);
            $etudiant->setSonParcours(1);
            $etudiant->setSonGroupe(1);
            $etudiant->setEstApprenti($estApprenti > 0);

            return $etudiant;

        } catch (Throwable $e) {
            throw new RuntimeException("Erreur lors de la création de l'étudiant", 0, $e);
        }
    }

    public function creerEnseignant(
        string $nom,
        string $prenom,
        string $adresse,
        string $ville,
        string $numTel,
        string $cp,
        string $email,
        DateTime $dateNaissance,
        string $genre,
        string $hashPass
    ): Enseignant {
        try {
            $data = [
                'nomPersonne'       => $nom,
                'prenomPersonne'    => $prenom,
                'adressePersonne'   => $adresse,
                'villePersonne'     => $ville,
                'numeroTelPersonne' => $numTel,
                'codePostal'        => $cp,
                'emailPersonne'     => $email,
                'dateNaissance'     => $dateNaissance->format('Y-m-d'),
                'genre'             => $genre,
                'passwordHash'      => $hashPass
            ];

            $response = ApiClient::post('enseignant', json_encode($data));
            $result = json_decode($response, true);

            return new Enseignant(
                $result['idPersonne'],
                $result['idEnseignant'],
                $nom,
                $prenom,
                $adresse,
                $ville,
                $numTel,
                $cp,
                $email,
                $dateNaissance,
                $genre,
                $hashPass
            );

        } catch (Throwable $e) {
            throw new RuntimeException("Erreur lors de la création de l'enseignant", 0, $e);
        }
    }

    public function modifierEtudiant(Etudiant $etudiant): void
    {
        try {
            $data = [
                'idPersonne'    => $etudiant->getIdPersonne(),
                'nomPersonne'   => $etudiant->getNomPersonne(),
                'prenomPersonne'=> $etudiant->getPrenomPersonne(),
                'adressePersonne'=> $etudiant->getAdressePersonne(),
                'villePersonne' => $etudiant->getVillePersonne(),
                'numeroTelPersonne'=> $etudiant->getNumeroTelPersonne(),
                'codePostal'    => $etudiant->getCodePostal(),
                'emailPersonne' => $etudiant->getEmailPersonne(),
                'dateNaissance' => $etudiant->getDateNaissance()->format('Y-m-d'),
                'genre'         => $etudiant->getGenre(),
                'passwordHash'  => $etudiant->getPasswordHash(),
                'anneeUnivEtu'  => $etudiant->getAnneeUnivEtu(),
                'promotion'     => $etudiant->getPromotion(),
                'anneeFin'      => $etudiant->getAnneeFin(),
                'estApprenti'   => $etudiant->isEstApprenti() ? 1 : 0,
                'typeBac'       => $etudiant->getTypeBac(),
                'saFormation'   => $etudiant->getSaFormation(),
                'sonParcours'   => $etudiant->getSonParcours(),
                'sonGroupe'     => $etudiant->getSonGroupe(),
                'covoiturage'   => $etudiant->getCovoiturage()
            ];

            ApiClient::put(
                'etudiant/' . $etudiant->getIdEtudiant(),
                json_encode($data)
            );

        } catch (Throwable $e) {
            throw new RuntimeException("Erreur lors de la modification de l'étudiant", 0, $e);
        }
    }

    public function modifierEnseignant(Enseignant $enseignant): void
    {
        try {
            $data = [
                'idPersonne' => $enseignant->getIdPersonne(),
                'nomPersonne'=> $enseignant->getNomPersonne(),
                'prenomPersonne'=> $enseignant->getPrenomPersonne(),
                'adressePersonne'=> $enseignant->getAdressePersonne(),
                'villePersonne'=> $enseignant->getVillePersonne(),
                'numeroTelPersonne'=> $enseignant->getNumeroTelPersonne(),
                'codePostal'=> $enseignant->getCodePostal(),
                'emailPersonne'=> $enseignant->getEmailPersonne(),
                'dateNaissance'=> $enseignant->getDateNaissance()->format('Y-m-d'),
                'genre'=> $enseignant->getGenre(),
                'passwordHash'=> $enseignant->getPasswordHash(),
                'sesRoles'=> $enseignant->getSesRoles(),
                'sesMatiere'=> $enseignant->getSesMatiere(),
                'sesFormationEnseigne'=> $enseignant->getSesFormationEnseigne()
            ];

            ApiClient::put(
                'enseignant/' . $enseignant->getIdEnseignant(),
                json_encode($data)
            );

        } catch (Throwable $e) {
            throw new RuntimeException("Erreur lors de la modification de l'enseignant", 0, $e);
        }
    }

    public function supprimerEtudiant(int $idEtudiant): bool
    {
        try {
            ApiClient::delete('etudiant/' . $idEtudiant);

            foreach ($this->iut->getSesEtudiants() as $k => $e) {
                if ($e->getIdEtudiant() === $idEtudiant) {
                    unset($this->iut->getSesEtudiants()[$k]);
                    return true;
                }
            }
            return true;

        } catch (Throwable $e) {
            return false;
        }
    }

    public function supprimerEnseignant(int $idEnseignant): bool
    {
        try {
            ApiClient::delete('enseignant/' . $idEnseignant);

            foreach ($this->iut->getSesEnseignants() as $k => $e) {
                if ($e->getIdEnseignant() === $idEnseignant) {
                    unset($this->iut->getSesEnseignants()[$k]);
                    return true;
                }
            }
            return true;

        } catch (Throwable $e) {
            return false;
        }
    }

    public function generePass(): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $pass = '';
        for ($i = 0; $i < 6; $i++) {
            $pass .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $pass;
    }

    public static function hashPassword(string $password): string
    {
        return base64_encode(hash('sha256', $password, true));
    }
}
