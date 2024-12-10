<?php

class ticket {
    private $numeroTicket;
    private $etat;
    private $type;
    private $priorite;
    private $titre;
    private $msg;
    private $nom;
    private $attributaire;
    public function __construct($numeroTicket, $etat, $type,$priorite,$titre,$msg) {
        $this->numeroTicket = $numeroTicket;
        $this->etat = $etat;
        $this->type = $type;
        $this->priorite = $priorite;
        $this->titre = $titre;
        $this->msg = $msg;
    }
    public function setAttributaire($attributaire) {
        $this->attributaire = $attributaire;
    }
    public function getAttributaire(){
        return $this->attributaire;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }

    public function getNumeroTicket() {
        return $this->numeroTicket;

    }
    public function getPriorite() {
        return $this->priorite;

    }
    public function getTitre() {
        return $this->titre;

    }
    public function getMsg() {
        return $this->msg;

    }
    /**
     * Retourne le nom de la personne ayant effectué la réservation.
     *
     * @return mixed
     */
    public function getEtat() {
        return $this->etat;
    }
    public function getType(){
        return $this->type;
    }
}
