<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Conteneur général pour le formulaire */
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto;
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
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-container input[type="submit"] {
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

        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="index.php?controleur=Utilisateur&action=loginUser" method="POST">
            <label for="nom">Nom de l'utilisateur :</label>
            <input type="text" id="nom" name="nomUtilisateur" placeholder="Nom de l'utilisateur" required>

            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>

            <input type="submit" value="Connexion">
        </form>
    </div>
</body>
</html>
