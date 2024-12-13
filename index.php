<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu avec Icônes</title>
    <!-- Lien vers FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Style global du menu */
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #333;
            border-radius: 10px;
        }

        nav li {
            display: inline-block;
            padding: 15px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }

        /* Style des icônes dans les liens */
        nav a i {
            margin-right: 8px; /* Espacement entre l'icône et le texte */
        }

        /* Style au survol des éléments du menu */
        nav a:hover {
            background-color: #444;
            border-radius: 5px;
            padding: 15px 20px;
            color: #2980b9; /* Change la couleur du texte au survol */
        }

        nav li {
            margin: 0 10px;
        }

        nav {
            padding: 10px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style du formulaire de connexion */
        .login-form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .login-form button:hover {
            background-color: #21618c;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php?page=home"><i class="fas fa-home"></i> Accueil</a></li>
            <li><a href="index.php?controleur=ticket&action=consultation"><i class="fas fa-ticket-alt"></i> Mes tickets</a></li>
            <?php
            session_start();
            if (!isset($_SESSION['Connected'])) {
                $_SESSION['Connected'] = false;
            }

            if ($_SESSION['Connected'] == false) {
                echo '<li><a href="index.php?controleur=Utilisateur&action=registerForm"><i class="fas fa-sign-in-alt"></i> Me connecter</a></li>';
            } else {
                if ($_SESSION['userType'] == 1) {
                    echo '<li><a href="index.php?controleur=ticket&action=adminConsultation"><i class="fas fa-cogs"></i> Gestion des tickets</a></li>';
                }
                echo '<li><a href="index.php?controleur=Utilisateur&action=account"><i class="fas fa-user-circle"></i> Mon Compte</a></li>';
            }
            ?>
        </ul>
    </nav>
    <?php
                if (isset($_GET['controleur']))
                    $controleur = filter_var($_GET['controleur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                else
                    $controleur = "general";

                switch ($controleur) {
                    case 'Utilisateur': 
                        include("controleurs/gestionUtilisateur.php");
                        break;
                    case 'ticket': 
                        include("Controleurs/gestionTicket.php");
                        break;
                }
                ?>

    <main>

    </main>
</body>

</html>
