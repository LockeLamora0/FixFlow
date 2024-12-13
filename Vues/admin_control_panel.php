<?php
echo "<div class='IdEntreprise-container'>";
echo "<p class='IdEntreprise-intro'>Voici l'ID de votre entreprise. Cet ID a été défini par le technicien. Utilisez-le pour accéder à vos tickets et autres ressources liées à la gestion de votre support.</p>";
echo "<span class='IdEntreprise-label'>L'ID de votre entreprise :</span> <span id='IdEntreprise' class='IdEntreprise-value'>" . $_SESSION['IdEntreprise'] . "</span>";
echo "<button class='copy-button' onclick='copyIdEntreprise()'>Copier l'ID</button>";
echo "<p id='successMessage' class='success-message'>ID copié dans le presse-papiers !</p>";
echo "</div>";


echo "<div class='tile-container'>"; 
if (empty($ticketsPourTechniciens)) {
    echo "<div class='empty-tickets-container'>";
    echo '<img src=".\images\no_task.png" alt="Aucun ticket disponible" class="no-task-image">';
    echo "<p class='no-task-message'>Aucun ticket disponible</p>";
    echo "</div>";
} else {
    foreach ($ticketsPourTechniciens as $unTicket) {
        if (is_object($unTicket)) {
            echo "<div class='ticket-tile'>";
            
            echo "<div class='ticket-header'>";
            echo "<h4>Ticket #" . $unTicket->getNumeroTicket() . "</h4>";
            echo "<p class='ticket-user'>" . $unTicket->getNom() . "</p>";
            echo "</div>";
    
            echo "<p class='ticket-title'>" . $unTicket->getTitre() . "</p>";
    
            $importance = $unTicket->getPriorite(); 
            $badgeClass = '';
    
            switch ($importance) {
                case 'Urgent':
                    $badgeClass = 'badge-high';
                    break;
                case 'Normal':
                    $badgeClass = 'badge-medium';
                    break;
                case 'Faible':
                    $badgeClass = 'badge-low';
                    break;
                default:
                    $badgeClass = 'badge-default';
                    break;
            }
    
            $typeIntervention = $unTicket->getType(); 
    
            echo "<div class='badge-container'>";
            echo "<span class='badge $badgeClass'>$importance</span>";
            echo "<span class='type-intervention'>$typeIntervention</span>";
            echo "</div>"; 
    
            echo "<a href='index.php?controleur=ticket&action=ticketDetails&numTicket=".$unTicket->getNumeroTicket()."' class='details-link'>
                    <button class='details-button'>Voir Détails</button>
                  </a>";
    
            echo "</div>"; 
        } else {
            echo "<p>Erreur : élément non valide</p>";
        }
    }
}

echo "</div>"; 
?>

<script>
    function copyIdEntreprise() {
        const IdEntrepriseText = document.getElementById('IdEntreprise').textContent;

        const tempInput = document.createElement('input');
        tempInput.value = IdEntrepriseText;
        document.body.appendChild(tempInput);

        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        document.execCommand('copy');

        document.body.removeChild(tempInput);

        const successMessage = document.getElementById('successMessage');
        successMessage.style.display = 'block';

        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);
    }
</script>

<style>
    /* Container pour le IdEntreprise */
    .IdEntreprise-container {
        margin: 30px 0;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .IdEntreprise-intro {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 15px;
        line-height: 1.5;
        text-align: center;
        font-weight: 400;
    }

    .IdEntreprise-label {
        font-weight: 600;
        font-size: 1.2em;
        color: #2c3e50;
    }

    .IdEntreprise-value {
        font-size: 1.3em;
        font-weight: bold;
        color: #2980b9;
        word-wrap: break-word;
    }

    .copy-button {
        padding: 10px 20px;
        background-color: #27ae60;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 15px;
        display: block;
        width: 100%;
        font-size: 1.1em;
    }

    .copy-button:hover {
        background-color: #219150;
    }

    .success-message {
        display: none;
        color: #27ae60;
        font-size: 1.1em;
        font-weight: bold;
        text-align: center;
        margin-top: 15px;
    }

    /* Container pour les tiles */
    .tile-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin: 20px;
    }

    /* Style pour chaque tile */
    .ticket-tile {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        transition: transform 0.3s ease-in-out;
        height: 220px;
    }

    /* Effet au survol des tiles */
    .ticket-tile:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    /* Disposition du ticket (header avec numéro et nom de l'utilisateur) */
    .ticket-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    /* Titre du ticket */
    .ticket-header h4 {
        font-size: 1.2em;
        color: #333;
        margin: 0;
    }

    /* Nom de l'utilisateur */
    .ticket-user {
        font-size: 0.9em;
        color: #7f8c8d;
        font-weight: 600;
        font-style: italic;
    }

    /* Texte du titre du ticket */
    .ticket-title {
        margin: 5px 0;
        font-size: 1.1em;
        color: #444;
        font-weight: bold;
    }

    /* Container pour le badge et le type d'intervention */
    .badge-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    /* Style pour les badges d'importance */
    .badge {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 50px;
        font-size: 0.9em;
        text-transform: uppercase;
        color: white;
        font-weight: bold;
    }

    /* Badge pour priorité haute (rouge) */
    .badge-high {
        background-color: #e74c3c; /* Rouge */
    }

    /* Badge pour priorité moyenne (jaune) */
    .badge-medium {
        background-color: #f39c12; /* Jaune */
    }

    /* Badge pour priorité basse (verte) */
    .badge-low {
        background-color: #2ecc71; /* Vert */
    }

    /* Badge par défaut (gris) */
    .badge-default {
        background-color: #95a5a6; /* Gris */
    }

    /* Type d'intervention affiché à côté du badge */
    .type-intervention {
        padding: 4px 12px;
        font-size: 0.85em;
        color: #fff;
        background-color: #3498db;
        border-radius: 50px;
        font-weight: bold;
    }

    /* Bouton pour voir plus de détails */
    .details-button {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 15px;
    }

    /* Changement de couleur du bouton au survol */
    .details-button:hover {
        background-color: #2980b9;
    }
    .empty-tickets-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* S'assure que tout le contenu est centré verticalement sur l'écran */
    width: 100%; /* S'assure que le contenu est centré horizontalement */
    margin: 0;
    padding: 0;
}


.no-task-image {
    max-width: 150px; /* Ajuster pour réduire la taille de l'image */
    max-height: 150px; /* Ajuster pour réduire la taille de l'image */
    width: auto;
    height: auto;
    margin-bottom: 10px; /* Espacement entre l'image et le message */
}

.no-task-message {
    font-size: 1em;
    color: #555;
    margin: 0;
    line-height: 1.4;
}

</style>
