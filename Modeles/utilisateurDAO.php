<?php
include 'modeles/Base.php';
include 'Modeles\utilisateur.php';

class utilisateurDAO extends Base{
    
    public function __construct() {
        parent::__construct('387912','vZYuri8vU5i1PD');
    }
    

    public function AjoutLesUtilisateur($nom,$mdp,$TokenEntreprise,$typeCompte){
        
        $resultatRequete= $this ->exec("INSERT INTO `Client`( `Nom`, `mdp`, `TokenEntreprise`, `typeCompte`) VALUES ('$nom','$mdp','$TokenEntreprise','$typeCompte')");
        
        return $resultatRequete;
    }
    public function getLesUtilisateur($token) {
        $resultatRequete = $this->query("SELECT * FROM `Client` where 'tokenUtilisateur' = '$token'");
        $tableauClient = $resultatRequete->fetchAll();
        $listeTicket = array();
    
        foreach ($tableauClient as $uneLigneClient) {
            // Créez un objet ticket pour chaque ligne
            $unObjetClient = new utilisateur(
                $uneLigneClient["id"],
                $uneLigneClient['Nom'],
                $uneLigneClient['mdp'],
                $uneLigneClient['TokenEntreprise'],
                $uneLigneClient['typeCompte'],
                
            );
    
            // Ajoutez l'objet à la liste
            $listeClient[] = $unObjetClient;
        }
        
        return $listeClient;
    }
    public function getConnexion($nom){
        $resultatRequete = $this->prepare("SELECT * FROM `Client` WHERE `Nom` = :nom");

        // Liaison des paramètres
        $resultatRequete->bindParam(':nom', $nom, PDO::PARAM_STR);
    
        // Exécution de la requête
        $resultatRequete->execute();
    
        // Récupérer les résultats
        $connexion = $resultatRequete->fetch();
        if($connexion){
            return $connexion;
        }else{
            return null;
        }
    }
    
}