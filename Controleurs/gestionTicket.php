<?php
include(".\\Modeles\\ticketDAO.php");

if (isset($_GET['action'])) {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $action = "consultation";
}

switch ($action) {
    case "adminConsultation":
        $ticketDAO = new ticketDAO();
        $ticketsPourTechniciens = $ticketDAO->getTicketsForTechnicians();
        include("./Vues/admin_dashboard.php");
        break;

    case "prendreTicket":
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->prendreTicket($_GET["numTicket"]);
        include("./Vues/confirm_ticket_action.php");
        break;

    case "resoudreTicket":
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->resoudreTicket($_GET["numTicket"]);
        include("./Vues/confirm_ticket_action.php");
        break;

    case 'consultation':
        $ticketDAO = new ticketDAO();
        $tousLesTickets = $ticketDAO->getLesTicket();
        include("./vues/visualisationTicket.php");
        break;

    case 'ticketDetails':
        $ticketDAO = new ticketDAO();
        $ticketDetails = $ticketDAO->getLesInfoTicket($_GET['numTicket']);
        include("./vues/ticket-details.php");
        break;

    case "ticketForm":
        include("./Vues/formTicket.php");
        break;

    case "addTicket":
        $ticketDAO = new ticketDAO();
        $ticketCreation = $ticketDAO->AjouterLesTicket($_POST["type"], $_POST['message'], $_POST['titre'], $_POST['priorite']);
        include("./vues/confirm_ticket_creation.php");
        break;

    case 'deletTicket':
        $ticketDAO = new ticketDAO();
        $ticketSuppression = $ticketDAO->deletTicket($_GET['numTicket']);
        include("./vues/confirm_ticket_deletion.php");
        break;

    
}
