<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        /* Conteneur général pour le formulaire */
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 50px auto;
            font-family: Arial, sans-serif;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-container input[type="radio"] {
            margin-right: 5px;
        }

        .form-container input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Lien vers la connexion */
        .form-container .connexion-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
            font-size: 0.9em;
            transition: color 0.3s ease;
        }

        .form-container .connexion-link:hover {
            color: #21618c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="index.php?controleur=Utilisateur&action=register" method="POST">
            <label for="nom">Nom de l'utilisateur :</label>
            <input type="text" id="nom" name="nomUtilisateur" placeholder="Nom de l'utilisateur">

            <label for="nbPlace">Mot de passe :</label>
            <input type="text" id="mdp" name="mdp" placeholder="Mot de passe">

            <label for="lieu">ID de votre entreprise :</label>
            <input type="text" id="IdEntreprise" name="IdEntreprise" placeholder="ID de votre entreprise">

            <label>Type de compte :</label>
            <label for="compteAdmin">Technicien</label>

            <input type="radio" id="compteAdmin" name="typeCompte" value="1">
            <label for="compteUtilisateur">Utilisateur</label>
            
            <input type="radio" id="compteUtilisateur" name="typeCompte" value="0" checked>
<br>
<br>
            <input type="submit" value="Inscription">
        </form>
        <a href="index.php?controleur=Utilisateur&action=loginForm" class="connexion-link">Connexion</a>
    </div>
    
</body>
</html>
