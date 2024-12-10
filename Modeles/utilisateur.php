<?php

class utilisateur {
    private $id;
    private $Nom;
    private $mdp;
    private $TokenEntreprise;
    private $typeCompte;

    public function __construct($id,$Nom, $mdp, $TokenEntreprise,$typeCompte) {
        $this->id = $id;
        $this->Nom = $Nom;
        $this->mdp = $mdp;
        $this->TokenEntreprise = $TokenEntreprise;
        $this->typeCompte= $typeCompte;
    }

    public function getNom() {
        return $this->Nom;

    }

    /**
     * Retourne le nom de la personne ayant effectué la réservation.
     *
     * @return mixed
     */
    public function getMdp() {
        return $this->mdp;
    }
    public function getTokenEntreprise(){
        return $this->TokenEntreprise;
    }
}
