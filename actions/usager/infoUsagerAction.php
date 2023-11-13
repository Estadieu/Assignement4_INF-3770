<?php

require('actions/database.php');

// Check if the user ID is passed as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idusager = $_GET['id'];

    // Check if the user exists
    $verifierusagerexiste = $bdd->prepare('SELECT * FROM usager WHERE id_usager = ?');
    $req = $verifierusagerexiste->execute(array($idusager));
    if (!$req){
        echo "Error executing SELECT query";
    }
    if($verifierusagerexiste->rowCount() > 0){

        // Retrieve user data
        $usagerInfo = $verifierusagerexiste->fetch();
        $usager_nom = $usagerInfo['nom'];
        $usager_prenom = $usagerInfo['prenom'];
        $usager_adresse = $usagerInfo['adresse'];
        $usager_civilite = $usagerInfo['civilite'];
        $usager_cdp = $usagerInfo['cdp'];
        $usager_ville = $usagerInfo['ville'];
        $usager_lieu_naiss = $usagerInfo['lieu_naiss'];
        $usager_num_secu = $usagerInfo['num_secu'];
        $usager_num_secu0 = $usagerInfo['num_secu0'];
        $usager_num_secu1 = $usagerInfo['num_secu1'];
        $usager_num_secu2 = $usagerInfo['num_secu2'];
        $usager_num_secu3 = $usagerInfo['num_secu3'];
        $usager_num_secu4 = $usagerInfo['num_secu4'];
        $usager_num_secu5 = $usagerInfo['num_secu5'];
        $usager_num_secu6 = $usagerInfo['num_secu6'];
        $heartRateMonday = $usagerInfo['heartRateMonday'];
        $heartRateTuesday = $usagerInfo['heartRateTuesday'];
        $heartRateWednesday = $usagerInfo['heartRateWednesday'];
        $heartRateThursday = $usagerInfo['heartRateThursday'];
        $heartRateFriday = $usagerInfo['heartRateFriday'];
        $heartRateSaturday = $usagerInfo['heartRateSaturday'];
        $heartRateSunday = $usagerInfo['heartRateSunday'];
        $usager_date_naiss = $usagerInfo['date_naiss'];

    } else {
        $errorMsg = "Error: The user does not exist";
    }

} else {
    $errorMsg = "Error: Nonexistent ID";
}
