<?php
include 'modeles/Base.php';
include 'Modeles\utilisateur.php';

class utilisateurDAO extends Base{
    
    public function __construct() {
        parent::__construct('387912','vZYuri8vU5i1PD');
    }
    

    public function AjoutLesUtilisateur($nom,$mdp,$IdEntreprise,$typeCompte){
        
        $resultatRequete= $this ->exec("INSERT INTO `Client`( `Nom`, `mdp`, `IdEntreprise`, `typeCompte`) VALUES ('$nom','$mdp','$IdEntreprise','$typeCompte')");
        
        return $resultatRequete;
    }
    public function getLesUtilisateur($IdEntreprise) {
        $resultatRequete = $this->query("SELECT * FROM `Client` where 'IdEntrepriseUtilisateur' = '$IdEntreprise'");
        $tableauClient = $resultatRequete->fetchAll();
        $listeTicket = array();
    
        foreach ($tableauClient as $uneLigneClient) {
            // Créez un objet ticket pour chaque ligne
            $unObjetClient = new utilisateur(
                $uneLigneClient["id"],
                $uneLigneClient['Nom'],
                $uneLigneClient['mdp'],
                $uneLigneClient['IdEntreprise'],
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