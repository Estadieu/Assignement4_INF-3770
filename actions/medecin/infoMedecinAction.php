<?php

require('actions/database.php');

// Check if the professional's ID is passed as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idmedecin = $_GET['id'];

    // Check if the professional exists in the database
    $verifiermedecinexiste = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ?');
    $req = $verifiermedecinexiste->execute(array($idmedecin));
    if (!$req){
        echo "Error executing SELECT query";
    }
    if($verifiermedecinexiste->rowCount() > 0){

        // Retrieve data
        $medecinInfo = $verifiermedecinexiste->fetch();
        $medecin_nom = $medecinInfo['nom'];
        $medecin_prenom = $medecinInfo['prenom'];
        $medecin_civilite = $medecinInfo['civilite'];
    } else {
        $errorMsg = "Error: The doctor does not exist";
    }

} else {
    $errorMsg = "Error: Nonexistent ID";
}
