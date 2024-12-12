<?php
include(".\\Modeles\\utilisateurDAO.php");
if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "consultation";


switch ($action) {
    case "registerForm":
        include("./vues/formInscription.php");
    break;
 
    case 'account':
        
        $sourceDeDonnees = new utilisateurDAO();
        // $user = $sourceDeDonnees->$sourceDeDonnees->getConnexion($_SESSION['userName']);
        include("./vues/page_compte.php");
        break;
    case "loginForm":
        include("./vues/formConnexion.php");
    break;
    
    case 'register':
        $sourceDeDonnees = new utilisateurDAO();
        $mdp =  password_hash($_POST['mdp'], PASSWORD_ARGON2ID);
        $listeReservation = $sourceDeDonnees->AjoutLesUtilisateur($_POST["nomUtilisateur"],$mdp,$_POST["token"],$_POST["typeCompte"]);
        include("./vues/formConnexion.php");
    break;

    case "loginUser":

        $sourceDeDonnees = new utilisateurDAO();
        
        $user = $sourceDeDonnees->getConnexion($_POST['nomUtilisateur']);
        $validationMdp = password_verify($_POST['mdp'],$user['mdp']);
        if($user){
            if($validationMdp == true){
                $_SESSION["Connected"] = true;

                $_SESSION['userId'] = $user['idClient'];
                $_SESSION['userName'] = $user['Nom'];
                $_SESSION['userType'] = $user['typeCompte'];
                $_SESSION['IdEntreprise'] = $user['IdEntreprise'];
                include('./vues/loginValidation.php');
            }
           
        }else {
            // Si aucun utilisateur n'est trouvé
            $messageErreur = "Mot de passe ou nom d'utilisateur incorrect.";
            include('./vues/loginValidation.php');
        }
        


}