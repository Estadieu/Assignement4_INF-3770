<?php
// Check if the user is authenticated
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

// Check if the ID is entered as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // Professional's ID as a parameter
    $idmedecin = $_GET['id'];

    // Delete the professional based on the specified ID parameter
    $supprimermedecin = $bdd->prepare('DELETE FROM medecin WHERE id_medecin = ?');
    $req = $supprimermedecin->execute(array($idmedecin));

    // Delete the professional from users
    $suprimref = $bdd->prepare('DELETE id_medecin FROM usager WHERE id_medecin = ?');
    $suprimref->execute(array($idmedecin));

    if (!$req){
        echo "Error executing DELETE query";
    } else {
        // Redirect the user to the information page
        header('Location: ../../affichermedecin.php');
    }
    
} else {
    echo "Deletion not possible";
}
