<?php
session_start();
require('actions/database.php');

// Form validation
if(isset($_POST['validate'])){

    // Check if the fields are filled
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
       
        // User data
        $utilisateur_pseudo = htmlspecialchars($_POST['pseudo']);
        $utilisateur_mdp = htmlspecialchars($_POST['mdp']);

        // Check if the user exists
        $RegardeutilisateurExiste = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo= ?');
        $req = $RegardeutilisateurExiste->execute(array($utilisateur_pseudo));
        if (!$req){
            echo "Error executing SELECT query";
        }
        if($RegardeutilisateurExiste->rowCount() > 0){ 
            // Retrieve user data
            $utilisateurInfos= $RegardeutilisateurExiste->fetch();

            // Check if the password is correct
            if(password_verify($utilisateur_mdp, $utilisateurInfos['mdp'])){
                // If the username and password match -> Session opening
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $utilisateurInfos['id'];
                $_SESSION['pseudo']= $utilisateurInfos['pseudo'];

                // Redirect the user to the homepage
                header('Location: index.php');
            } else {
                $errorMsg = "Your password is incorrect";
            }
        } else {
            $errorMsg = "The entered fields are not correct";
        }
    } else {
        $errorMsg = "Not all fields are entered!";
    }
}
