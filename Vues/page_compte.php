<div class="account-container">
    <h2>Nom du compte :</h2>
    <p><?php echo htmlspecialchars($user->getNom()); ?></p>
    <hr>

    <h3>Modifier l'ID de l'entreprise :</h3>
    <form action="index.php?controleur=Utilisateur&action=modifierIdEntreprise" method="POST">
        <label for="id">ID de l'entreprise</label>
        <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($user->getIdEntreprise()); ?>">
        <input type="submit" value="Modifier">
    </form>
    <hr>

    <h3>Modifier le mot de passe :</h3>
    <form action="index.php?controleur=Utilisateur&action=modifierMotDePasse" method="POST">
        <label for="mdp">Nouveau mot de passe</label>
        <input type="password" id="mdp" name="mdp">
        <input type="submit" value="Modifier">
    </form>
    <h3>se déconnecter</h3>
    <form action="index.php?controleur=Utilisateur&action=deconnexion"method="POST">
        <input type="submit" value="Déconnexion">
    </form>
</div>
<style>
    .account-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}

.account-container h2,
.account-container h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
    color: #333;
}

.account-container p {
    font-size: 1em;
    margin-bottom: 15px;
    color: #666;
}

.account-container hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 15px 0;
}

.account-container label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.account-container input[type="text"],
.account-container input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.account-container input[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
    width: 100%;
}

.account-container input[type="submit"]:hover {
    background-color: #218838;
}

</style>