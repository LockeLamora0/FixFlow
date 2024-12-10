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

        .details-link button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto 0;
        }

        .details-link button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h4>Ticket #<?= htmlspecialchars($listeTicket->getNumeroTicket()); ?></h4>
        </div>
        <div class="ticket-detail">
            <span>Titre :</span> <?= htmlspecialchars($listeTicket->getTitre()); ?>
        </div>
        <div class="ticket-detail">
            <span>État :</span> <?= htmlspecialchars($listeTicket->getEtat()); ?>
        </div>
        <div class="ticket-detail">
            <span>Message :</span> <?= htmlspecialchars($listeTicket->getMsg()); ?>
        </div>
        <div class="ticket-detail">
            <span>Nom du demandeur :</span> <?= htmlspecialchars($listeTicket->getNom()); ?>
        </div>
        <div class="ticket-detail">
            <span>Priorité :</span> <?= htmlspecialchars($listeTicket->getPriorite()); ?>
        </div>
        <div class="ticket-detail">
            <span>Type :</span> <?= htmlspecialchars($listeTicket->getType()); ?>
        </div>
        <?php 
        var_dump($listeTicket->getAttributaire());
            if(is_null($listeTicket->getAttributaire())){
                echo "<a href='index.php?controleur=ticket&action=prendreTicket&numTicket=" . $listeTicket->getNumeroTicket() . "' class='details-link'><button>Prendre le ticket</button></a>";
            }else{
                echo "ee";
            }

            
        ?>
    </div>
</body>
</html>
