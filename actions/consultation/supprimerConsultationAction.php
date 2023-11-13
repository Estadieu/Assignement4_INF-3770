<?php
// Check if the user is authenticated
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

// Check if the professional's ID and the appointment date are entered as parameters in the URL
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['date']) AND !empty($_GET['date'])){

    // Professional's ID as a parameter
    $idmedecin = $_GET['id'];
    $date = $_GET['date'];

    // Delete the consultation based on the specified ID and date parameters
    $supprimerconsultation = $bdd->prepare('DELETE  FROM rdv WHERE id_medecin = ? AND date_rdv = ?');
    $req = $supprimerconsultation->execute(array($idmedecin, $date));
    if (!$req){
        echo "Error executing DELETE query";
    } else {
        // Redirect the user to the consultation information page
        header('Location: ../../afficherconsultation.php');
    }
    
} else {
    echo "Deletion not possible";
}
