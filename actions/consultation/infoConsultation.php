<?php

require('actions/database.php');

// Check if the user ID is passed as a parameter in the URL
// Check if the healthcare professional's ID and the appointment date are entered as parameters in the URL
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['date']) AND !empty($_GET['date'])){

    // ID of the professional as a parameter
    $idmedecin = $_GET['id'];
    $date = $_GET['date'];

    // Check if the appointment exists
    $verifierConsultationExiste = $bdd->prepare('SELECT * FROM rdv WHERE id_medecin = ? AND date_rdv = ? ');
    $req = $verifierConsultationExiste->execute(array($idmedecin, $date));
    if (!$req){
        echo "Error executing SELECT query";
    }
    if($verifierConsultationExiste->rowCount() > 0){

        // Retrieve consultation data
        $consultationInfo = $verifierConsultationExiste->fetch();
        $consultation_duree = $consultationInfo['duree'];
        $consultation_medecin = $consultationInfo['id_medecin'];
        $consultation_date = $consultationInfo['date_rdv'];
        $consultation_usager = $consultationInfo['id_usager'];

    } else {
        $errorMsg = "Error: The consultation does not exist";
    }

} else {
    $errorMsg = "Error: ID or DATE not provided";
}
