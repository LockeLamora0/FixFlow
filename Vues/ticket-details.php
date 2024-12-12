<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .ticket-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 50px auto;
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ticket-header {
            text-align: center;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .ticket-header h4 {
            margin: 0;
            color: #2c3e50;
        }

        .ticket-detail {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .ticket-detail span {
            font-weight: bold;
            color: #34495e;
        }

        /* Styles communs pour tous les boutons */
        .details-link button,
        .details-link.disabled-button {
            display: block;
            width: 100%; /* Les boutons occupent toute la largeur */
            padding: 10px 15px;
            margin: 20px 0;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        }

        /* Bouton pour "Prendre le ticket" */
        .details-link .prendre-ticket {
            background-color: #27ae60;
            color: white;
        }

        .details-link .prendre-ticket:hover {
            background-color: #219150;
        }

        /* Bouton pour "Résoudre le ticket" */
        .details-link .resoudre-ticket {
            background-color: #e67e22;
            color: white;
        }

        .details-link .resoudre-ticket:hover {
            background-color: #d2691e;
        }

        /* Bouton pour "ticket déjà attribué" (désactivé) */
        .details-link .disabled-button {
            background-color: #bdc3c7;
            color: #7f8c8d;
            cursor: not-allowed;
        }

    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h4>Ticket #<?= htmlspecialchars($ticketDetails->getNumeroTicket()); ?></h4>
        </div>
        <div class="ticket-detail">
            <span>Titre :</span> <?= htmlspecialchars($ticketDetails->getTitre()); ?>
        </div>
        <div class="ticket-detail">
            <span>État :</span> <?= htmlspecialchars($ticketDetails->getEtat()); ?>
        </div>
        <div class="ticket-detail">
            <span>Message :</span> <?= htmlspecialchars($ticketDetails->getMsg()); ?>
        </div>
        <div class="ticket-detail">
            <span>Nom du demandeur :</span> <?= htmlspecialchars($ticketDetails->getNom()); ?>
        </div>
        <div class="ticket-detail">
            <span>Priorité :</span> <?= htmlspecialchars($ticketDetails->getPriorite()); ?>
        </div>
        <div class="ticket-detail">
            <span>Type :</span> <?= htmlspecialchars($ticketDetails->getType()); ?>
        </div>
        <?php 
        if(is_null($ticketDetails->getAttributaire())){
            echo "<a href='index.php?controleur=ticket&action=prendreTicket&numTicket=" . $ticketDetails->getNumeroTicket() . "' class='details-link'><button class='prendre-ticket'>Prendre le ticket</button></a>";
        } elseif($ticketDetails->getAttributaire() == $_SESSION['userName']){
            echo "<a href='index.php?controleur=ticket&action=resoudreTicket&numTicket=" . $ticketDetails->getNumeroTicket() . "' class='details-link'><button class='resoudre-ticket'>Résoudre le ticket</button></a>";
        } else {
            echo "<a href='#' class='details-link'><button class='disabled-button'>Ticket déjà attribué</button></a>";
        }
        ?>
    </div>
</body>
</html>
