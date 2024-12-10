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
 
    case "loginForm":
        echo"rtty";
        include("./vues/formConnexion.php");
    break;
    
    case 'register':
        echo'dd';
        $sourceDeDonnees = new utilisateurDAO();
        $mdp =  password_hash($_POST['mdp'], PASSWORD_ARGON2ID);
        var_dump($mdp);
        $listeReservation = $sourceDeDonnees->AjoutLesUtilisateur($_POST["nomUtilisateur"],$mdp,$_POST["token"],$_POST["typeCompte"]);
        include("./vues/formConnexion.php");
    break;

    case "loginUser":
        echo "login";

        $sourceDeDonnees = new utilisateurDAO();
        
        $user = $sourceDeDonnees->getConnexion($_POST['nomUtilisateur']);
        $validationMdp = password_verify($_POST['mdp'],$user['mdp']);
        if($user){
            if($validationMdp == true){
                $_SESSION["Connected"] = true;

                $_SESSION['userId'] = $user['idClient'];
                $_SESSION['userName'] = $user['Nom'];
                $_SESSION['userType'] = $user['typeCompte'];
                $_SESSION['tokenEntreprise'] = $user['TokenEntreprise'];
                var_dump($_SESSION['userId'],$_SESSION['userName'],$_SESSION['tokenEntreprise']);
                include('./vues/loginValidation.php');
            }
           
        }else {
            // Si aucun utilisateur n'est trouvé
            $messageErreur = "Mot de passe ou nom d'utilisateur incorrect.";
            include('./vues/loginValidation.php');
        }
        


}