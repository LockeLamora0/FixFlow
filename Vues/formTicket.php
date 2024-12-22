<div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
    <form action="index.php?controleur=ticket&action=addTicket" method="POST" style="background: #f9f9f9; padding: 20px; border-radius: 10px; width: 100%; max-width: 500px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Créer un Ticket</h2>

        <!-- Champ Titre -->
        <input type="text" id="titre" name="titre" placeholder="Titre du ticket" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Sélections côte à côte -->
        <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 15px;">
            <select name="type" id="type" placeholder="Type d'incident" style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="Informatique">Informatique</option>
                <option value="logistique">Logistique</option>
                <option value="rh">RH</option>
                <option value="Maintenance">Maintenance applicative</option>
                <option value="Service Compte">Service Compte</option>
            </select>
            <select name="priorite" id="priorite" placeholder="Priorité" style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="Urgent">Urgent (Critique)</option>
                <option value="Moyenne">Moyenne (Moyenne priorité)</option>
                <option value="Faible">Faible (Basse priorité)</option>
            </select>
        </div>

        <!-- Champ Message -->
        <textarea id="message" name="message" rows="4" placeholder="Votre message" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; resize: none;"></textarea>

        <!-- Bouton -->
        <input type="submit" value="Créer" style="width: 100%; padding: 10px; background-color: #2980b9; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em;">
    </form>
</div>
