<?php
include(".\\Modeles\\ticketDAO.php");

// Récupération de l'action depuis l'URL, ou "consultation" par défaut
if (isset($_GET['action'])) {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $action = "consultation";
}

// Traitement en fonction de l'action
switch ($action) {
    case "adminConsultation":
        // Récupération des tickets pour les techniciens
        $ticketDAO = new ticketDAO();
        $ticketsPourTechniciens = $ticketDAO->getTicketsForTechnicians();
        include("./Vues/admin_control_panel.php");
        break;

    case "prendreTicket":
        // Prendre un ticket spécifique
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->prendreTicket($_GET["numTicket"]);
        include("./Vues/ConfTicket.php");
        break;

    case "resoudreTicket":
        // Résoudre un ticket spécifique
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->resoudreTicket($_GET["numTicket"]);
        include("./Vues/ConfTicket.php");
        break;

    case 'consultation':
        // Affichage des tickets disponibles
        $ticketDAO = new ticketDAO();
        $tousLesTickets = $ticketDAO->getLesTicket();
        include("./vues/visualisationTicket.php");
        break;

    case 'ticketDetails':
        // Affichage des détails d'un ticket spécifique
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->getLesInfoTicket($_GET['numTicket']);
        include("./vues/ticket-details.php");
        break;

    case "ticketForm":
        // Affichage du formulaire de création de ticket
        include("./Vues/formTicket.php");
        break;

    case "addTicket":
        // Ajout d'un nouveau ticket
        $ticketDAO = new ticketDAO();
        $ticketCreation = $ticketDAO->AjouterLesTicket($_POST["type"], $_POST['message'], $_POST['titre'], $_POST['priorite']);
        include("./vues/ConfCreationTicket.php");
        break;

    case 'deletTicket':
        // Suppression d'un ticket spécifique
        $ticketDAO = new ticketDAO();
        $ticketSuppression = $ticketDAO->deletTicket($_GET['numTicket']);
        include("./vues/ConfSupTicket.php");
        break;

    
}
