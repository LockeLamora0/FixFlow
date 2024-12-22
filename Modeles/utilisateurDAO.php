<?php
include 'modeles/Base.php';
include 'Modeles\utilisateur.php';

class utilisateurDAO extends Base{
    
    public function __construct() {
        parent::__construct('387912','vZYuri8vU5i1PD');
    }
    
    public function updateEntrepriseId ($userName,$id){
        
        $resultatRequete=  $this->prepare("UPDATE `Compte` SET `IdEntreprise`= :id WHERE `Nom`= :nom");
        $resultatRequete->bindParam(':id', $id);
        $resultatRequete->bindParam(':nom', $userName);
        $resultatRequete->execute();
        
        return $resultatRequete;
    }
    public function updateMotDePasse ($userName,$mdp){
        
        $resultatRequete=  $this->prepare("UPDATE `Compte` SET `mdp`= :mdp WHERE `Nom`= :nom");
        $resultatRequete->bindParam(':mdp', $mdp);
        $resultatRequete->bindParam(':nom', $userName);
        $resultatRequete->execute();
        
        return $resultatRequete;
    }
    public function AjoutLesUtilisateur($nom,$mdp,$IdEntreprise,$typeCompte){
        
        $resultatRequete= $this ->exec("INSERT INTO `Compte`( `Nom`, `mdp`, `IdEntreprise`, `typeCompte`) VALUES ('$nom','$mdp','$IdEntreprise','$typeCompte')");
        
        return $resultatRequete;
    }
    public function getLesUtilisateur($IdEntreprise) {
        $resultatRequete = $this->query("SELECT * FROM `Compte` where 'IdEntrepriseUtilisateur' = '$IdEntreprise'");
        $tableauCompte = $resultatRequete->fetchAll();
        $listeCompte = array();
    
        foreach ($tableauCompte as $uneLigneCompte) {
            // Créez un objet ticket pour chaque ligne
            $unObjetCompte = new utilisateur(
                $uneLigneCompte["idCompte "],
                $uneLigneCompte['Nom'],
                $uneLigneCompte['mdp'],
                $uneLigneCompte['IdEntreprise'],
                $uneLigneCompte['typeCompte'],
                
            );
    
            // Ajoutez l'objet à la liste
            $listeCompte[] = $unObjetCompte;
        }
        
        return $listeCompte;
    }
    public function getConnexion($nom){
        $resultatRequete = $this->prepare("SELECT * FROM `Compte` WHERE `Nom` = :nom");

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
    public function getLesInfoCompte($nom){
        $resultatRequete = $this->prepare("SELECT * FROM `Compte` WHERE `Nom` = :nom");

        // Liaison des paramètres
        $resultatRequete->bindParam(':nom', $nom, PDO::PARAM_STR);
    
        // Exécution de la requête
        $resultatRequete->execute();
        // Récupérer les résultats
        $connexion = $resultatRequete->fetch();
        if ($connexion) {
            $unObjetCompte = new utilisateur($connexion["idCompte"], $connexion['Nom'], $connexion['mdp'], $connexion['IdEntreprise'], $connexion["typeCompte"]);
            return $unObjetCompte;
        } else {
            return null;
        }
    }
}