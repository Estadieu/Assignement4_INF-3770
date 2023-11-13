<?php
session_start();
require('actions/database.php');

// Form validation
if(isset($_POST['validate'])){

    // Check if the user has filled in all the fields
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
        // User data
        $utilisateur_pseudo = htmlspecialchars($_POST['pseudo']);
        $utilisateur_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if the user already exists on the site
        $checkIfutilisateurAlreadyExists = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE pseudo = ?');
        $checkIfutilisateurAlreadyExists->execute(array($utilisateur_pseudo));

        if($checkIfutilisateurAlreadyExists->rowCount() == 0){
            
            // Insert the user into the database
            $insertutilisateurOnWebsite = $bdd->prepare('INSERT INTO utilisateur(pseudo, mdp) VALUES(?, ?)');
            $insertutilisateurOnWebsite->execute(array($utilisateur_pseudo, $utilisateur_password));

            // Retrieve user information
            $getInfosOfThisutilisateurReq = $bdd->prepare('SELECT pseudo, mdp FROM utilisateurs WHERE pseudo = ?');
            $getInfosOfThisutilisateurReq->execute(array($utilisateur_pseudo));

            $utilisateursInfos = $getInfosOfThisutilisateurReq->fetch();

            // Authenticate the user on the site and retrieve their data in session global variables
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $utilisateursInfos['id'];
            $_SESSION['pseudo'] = $utilisateursInfos['pseudo'];

            // Redirect the user to the homepage
            header('Location: index.php');

        } else {
            $errorMsg = "The user already exists on the site";
        }

    } else {
        $errorMsg = "Please complete all fields...";
    }
}
