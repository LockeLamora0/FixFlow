<?php
include(".\\Modeles\\ticketDAO.php");
if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "consultation";


switch ($action) {
    case "adminConsultation":
        $sourceDeDonnees = new ticketDAO();
        $listeTicket = $sourceDeDonnees->getTicketsForTechnicians();
        include("./Vues/admin_control_panel.php");
    break;
    case"prendreTicket":
        $sourceDeDonnees = new ticketDAO();
        $ticket=$sourceDeDonnees->prendreTicket($_GET["numTicket"]);
        include("./Vues/ConfTicket.php");
        break;
    case 'consultation':
        
        $sourceDeDonnees = new ticketDAO();
        $listeTicket = $sourceDeDonnees->getLesTicket();
        include("./vues/visualisationTicket.php");
        break;
     case 'ticketDetails':
        
        $sourceDeDonnees = new ticketDAO();
        $listeTicket = $sourceDeDonnees->getLesInfoTicket($_GET['numTicket']);
        include("./vues/ticket-details.php");
        break;
    case "ticketForm":
        include("./Vues/formTicket.php");
        break;
    case "addTicket":
        $sourceDeDonnees = new ticketDAO();
        var_dump($_POST["type"],$_POST['message'],$_POST['titre'],$_POST['priorite']);
        $listeTicket = $sourceDeDonnees->AjouterLesTicket($_POST["type"],$_POST['message'],$_POST['titre'],$_POST['priorite']);
        include("./vues/visualisationTicket.php");
        break;

    //         $sourceDeDonnees = new reservationDAO();
    //         include("./vues/formulaireReservation.php");
    //         break;

    // case 'EnregistrerReservation':
    //             $sourceDeDonnees = new reservationDAO();
    //             $idSoiree = $_GET['IdSoiree'];
    //             include("./vues/formulaireReservation.php");
    //             break;

    // case 'reserverSoiree':

    //     $sourceDeDonnees = new reservationDAO();
    //     $resultatRequete = $sourceDeDonnees->reserverSoiree($_POST['nom'],$_POST['prenom'],$_POST['nbPlace'],$_POST['IdSoiree']);
    //     break;

}