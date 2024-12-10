<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?controleur=ticket&action=addTicket" method="POST">

        <input type="text" id="titre" name="titre" placeholder="Titre du ticket" required><br><br>


        <select name="type" id="type" placeholder="selectionner un type d'incident" >
            <option value="Informatique">Informatique</option>
            <option value="logistique">logistique</option>
            <option value="rh">rh</option>
            <option value="Maintenance">Maintenance applicative</option>
            <option value="Service client">Service client</option>
        </select>
        <select name="priorite" id="priorite" placeholder="selectionner une priorite d'incident">
            <option value="Urgent">Urgent (Critique)</option>
 
            <option value="Normal">Normal (Moyenne priorité)</option>
            <option value="Faible">Faible (Basse priorité)</option>
        </select>
        <br>
        <textarea id="message" name="message" rows="4" cols="50" placeholder="votre message" required></textarea>
        <br>
        <input type="submit" value="crée">
    </form>
    
</body>
</html>
