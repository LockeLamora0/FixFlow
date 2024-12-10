<?php
/**
 * Classe abstraite pour les classes DAO
 */
	
	
 class Base {
    private $db;

    /**
     * Constructeur de la classe Base
     * @param string $user
     * @param string $mdp
     */
    public function __construct(string $user, string $mdp) {         
        try {
            /* =============================BD LOCALE =============================================== */
            /*
            $serveurBdLocal = 'localhost';
            $nomBdLocale = "";
            $this->db = new PDO("mysql:host=".$serveurBdLocal.";dbname=".$nomBdLocale, $user, $mdp);
            */

            /* =============================BD DISTANTE =============================================== */
            $serveurBdDistant = 'mysql-gestionticket.alwaysdata.net';
            $nomBdDistante = "gestionticket_test";
            $this->db = new PDO("mysql:host=".$serveurBdDistant.";dbname=".$nomBdDistante, $user, $mdp);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active les exceptions
            $this->db->query("SET CHARACTER SET utf8");
        } catch (PDOException $erreur) {
            die("Erreur de connexion à la base de données: " . $erreur->getMessage());
        }
    }

    /**
     * Méthode publique pour exécuter des requêtes avec `query`
     * @param string $sql
     * @return PDOStatement|false
     */
    public function query($sql) {
        return $this->db->query($sql);
    }

    /**
     * Méthode publique pour exécuter des requêtes avec `exec`
     * @param string $sql
     * @return int|false
     */
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    /**
     * Méthode publique pour préparer une requête avec `prepare`
     * @param string $sql
     * @return PDOStatement|false
     */
    public function prepare($sql) {
        return $this->db->prepare($sql);
    }
}

