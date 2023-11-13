<?php
// Check if the user is authenticated
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

// Check if the ID is entered as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // User's ID as a parameter
    $idusager = $_GET['id'];

    // Delete the user based on the specified ID parameter
    $supprimerUsager = $bdd->prepare('DELETE FROM usager WHERE id_usager = ?');
    $req = $supprimerUsager->execute(array($idusager));
    if (!$req){
        echo "Error executing DELETE query";
    } else {
        // Redirect the user to the user information page
        header('Location: ../../afficherUsager.php');
    }
    
} else {
    echo "Deletion not possible";
}
