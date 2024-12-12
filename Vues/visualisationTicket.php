<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        .ticket-page a {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .ticket-page a:hover {
            background-color: #21618c;
        }

        .ticket-page table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .ticket-page table th, .ticket-page table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .ticket-page table th {
            background-color: #333;
            color: white;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        .ticket-page table tr:hover {
            background-color: #f1f1f1;
        }

        .ticket-page button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        .ticket-page button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="ticket-page">
        <a href="index.php?controleur=ticket&action=ticketForm">Créer un ticket</a>

        <?php
        echo "<table>";
        echo "<tr><th>Numéro</th><th>Titre</th><th>État</th><th>Type</th><th>Action</th></tr>";

        foreach ($tousLesTickets as $unTicket) {
            if (is_object($unTicket)) {
                echo "<tr>";
                echo "<td>" . $unTicket->getNumeroTicket() . "</td>";
                echo "<td>" . $unTicket->getTitre() . "</td>";
                echo "<td>" . $unTicket->getEtat() . "</td>";
                echo "<td>" . $unTicket->getType() . "</td>";
                echo "<td><a href='index.php?controleur=ticket&action=deletTicket&numTicket=" . $unTicket->getNumeroTicket() . "'><button>Supprimer le ticket</button></a></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='4'>Erreur : élément non valide</td></tr>";
            }
        }

        echo "</table>";
        ?>
    </div>
</body>
</html>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f9;
    color: #333;
}

.ticket-page a {
    display: inline-block;
    background-color: #2980b9;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    margin-bottom: 20px;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

.ticket-page a:hover {
    background-color: #21618c;
}

.ticket-page table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.ticket-page table th, .ticket-page table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.ticket-page table th {
    background-color: #333;
    color: white;
    text-transform: uppercase;
    font-size: 0.9em;
}

.ticket-page table tr:hover {
    background-color: #f1f1f1;
}

.ticket-page button {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em;
    transition: background-color 0.3s ease;
}

.ticket-page button:hover {
    background-color: #c0392b;
}

</style>