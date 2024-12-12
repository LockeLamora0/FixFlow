<?php
include 'modeles/Base.php';
include 'Modeles\ticket.php';

class ticketDAO extends Base{
    
    public function __construct() {
        parent::__construct('387912','vZYuri8vU5i1PD');
    }
    public function prendreTicket($numTicket){
        $etat = "En cours";
        $resultatRequete = $this->prepare("UPDATE `ticket` SET `etat`=:etat,`attributaire`=:nom WHERE numeroTicket=:num");
        $resultatRequete->bindParam(':etat', $etat);
        $resultatRequete->bindParam(':nom', $_SESSION['userName']);
        $resultatRequete->bindParam(':num', $numTicket);
        return $resultatRequete->execute(); 
    }
    public function resoudreTicket($numTicket){
        $etat = "Fermé";
        $resultatRequete = $this->prepare("UPDATE `ticket` SET `etat`=:etat,`attributaire`=:nom WHERE numeroTicket=:num");
        $resultatRequete->bindParam(':etat', $etat);
        $resultatRequete->bindParam(':nom', $_SESSION['userName']);
        $resultatRequete->bindParam(':num', $numTicket);
        return $resultatRequete->execute(); 
    }
    
    public function getLesTicket() {
        $resultatRequete = $this->prepare("SELECT * FROM `ticket` WHERE idCompte = :id AND IdEntreprise = :token");
        $resultatRequete->bindParam(':id', $_SESSION['userId']);
        $resultatRequete->bindParam(':token', $_SESSION['IdEntreprise']);
        $resultatRequete->execute(); 
        $tableauTicket = $resultatRequete->fetchAll(PDO::FETCH_ASSOC);
        $listeTicket = array();
    
        foreach ($tableauTicket as $uneLigneTicket) {
            // Crée un objet ticket avec les données récupérées
            $unObjetTicket = new ticket(
                $uneLigneTicket["numeroTicket"],
                $uneLigneTicket['etat'],
                $uneLigneTicket['type'],
                $uneLigneTicket['Priorité'],
                $uneLigneTicket['titreTicket'],
                $uneLigneTicket['message']
            );
    
            // Définit l'attributaire pour cet objet ticket
    
            // Ajoute l'objet ticket à la liste
            $listeTicket[] = $unObjetTicket;
        }
    
        return $listeTicket;
    }
    
    public function getTicketsForTechnicians() {
        // La requête SQL récupère les tickets et le nom des clients
        $resultatRequete = $this->prepare("SELECT ticket.*, Client.Nom FROM `ticket` 
                                           INNER JOIN Client ON Client.idClient = ticket.idCompte 
                                           WHERE ticket.IdEntreprise = :token and `etat` !='Fermé'");
        $resultatRequete->bindParam(':token', $_SESSION['IdEntreprise']);
        $resultatRequete->execute(); 
        $tableauTicket = $resultatRequete->fetchAll(PDO::FETCH_ASSOC);
    
        $listeTicket = array();
    
        // Parcours de chaque ligne de résultat
        foreach ($tableauTicket as $uneLigneTicket) {
            // Créer l'objet Ticket
            $unObjetTicket = new ticket(
                $uneLigneTicket["numeroTicket"],
                $uneLigneTicket['etat'],
                $uneLigneTicket['type'],
                $uneLigneTicket['Priorité'],
                $uneLigneTicket['titreTicket'],
                $uneLigneTicket['message']
            );
    
            // Ajouter le nom de l'utilisateur à l'objet ticket (si possible via une méthode setNom)
            $unObjetTicket->setNom($uneLigneTicket['Nom']);
    
            // Ajouter l'objet Ticket à la liste
            $listeTicket[] = $unObjetTicket;
        }
    
        return $listeTicket;
    }
    public function getLesInfoTicket($id){
        $resultatRequete = $this->prepare("SELECT ticket.*, Client.Nom FROM `ticket` 
        INNER JOIN Client ON Client.idClient = ticket.idCompte 
        WHERE ticket.numeroTicket = :numTicket");
        $resultatRequete->bindParam(':numTicket', $id);
        $resultatRequete->execute(); 
        $InfoTicket = $resultatRequete->fetch();


        $unObjetTicket= new ticket($InfoTicket['numeroTicket'],$InfoTicket['etat'],$InfoTicket['type'],$InfoTicket['Priorité'],$InfoTicket['titreTicket'],$InfoTicket['message']);
        $unObjetTicket->setNom($InfoTicket['Nom']);
        $unObjetTicket->setAttributaire($InfoTicket['attributaire']);

        $leTicket = $unObjetTicket;
        return $leTicket;

    }
    
    public function AjouterLesTicket($type,$msg,$titre,$priorite){
        $numTicket = random_int(1000,9999);
        $etat = "En attente";
        $resultatRequete= $this->prepare("INSERT INTO `ticket` (`numeroTicket`, `etat`, `type`, `IdEntreprise`, `idCompte`, `message`, `titreTicket`, `Priorité`) VALUES (:numeroTicket, :etat, :type, :IdEntreprise, :idCompte, :message, :titre, :priorite)");
        $resultatRequete->bindParam(':numeroTicket', $numTicket);
        $resultatRequete->bindParam(':etat', $etat);
        $resultatRequete->bindParam(':type', $type);
        $resultatRequete->bindParam(':IdEntreprise', $_SESSION['IdEntreprise']);
        $resultatRequete->bindParam(':idCompte', $_SESSION['userId']);
        $resultatRequete->bindParam(':message', $msg);
        $resultatRequete->bindParam(':titre', $titre);
        $resultatRequete->bindParam(':priorite', $priorite);
        $resultatRequete->execute();
        return $resultatRequete;
    
    }
    public function deletTicket($numTicket){
        $resultatRequete = $this->prepare("DELETE FROM `ticket` WHERE `numeroTicket` = :num");
        $resultatRequete->bindParam(':num', $numTicket);
        return $resultatRequete->execute(); 
    }
    // public function AjoutLesTicket($nom,$mdp,$IdEntreprise,$typeCompte){
    //     $resultatRequete= $this ->exec("INSERT INTO `Client`( `Nom`, `mdp`, `IdEntreprise`,`typeCompte`) VALUES  ('$nom','$mdp','$IdEntreprise','$typeCompte')");
    //     return $resultatRequete;
    // }

    // public function reserverSoiree($nom, $prenom, $nbPlace, $idSoiree){
    //     $resultatRequete= $this ->exec("INSERT INTO `reservation`(`nom`,`prenom`,`nbPlace`,`idSoiree`) VALUES ($nom,$prenom,$nbPlace,$idSoiree) ");
    //     return $resultatRequete;
    // }

}