<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?controleur=ticket&action=ticketForm">crée un ticket</a>
</body>
</html>

<?php

echo "<table>";
echo "<tr><th>Numéro</th><th>État</th><th>Type</th><th>action</th></tr>";

foreach ($listeTicket as $unTicket) {
    // Assurez-vous que $unTicket est bien un objet
    if (is_object($unTicket)) {
        echo "<tr>";
        echo "<td>" . $unTicket->getNumeroTicket() . "</td>";
        echo "<td>" . $unTicket->getEtat() . "</td>";
        echo "<td>" . $unTicket->getType() . "</td>";
        echo "<td>". "<a href='index.php?controleur=ticket&action=deletTicket&numTicket=" . $unTicket->getNumeroTicket() . "' <button> supprimer le ticket</button></a>"."</td>";
        echo "</tr>";
    } else {
        echo "<tr><td colspan='3'>Erreur : élément non valide</td></tr>";
    }
}

echo "</table>";
?>
<style>
    
</style>