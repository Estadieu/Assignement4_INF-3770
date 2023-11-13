<?php
require('actions/database.php');

// Form validation
if(isset($_POST['validate'])){

    // Check if the fields are filled
    if(!empty($_POST['duree']) AND !empty($_POST['date'])){

        // Data to be used in the query
        $new_date_rdv = $_POST['date'];
        $new_duree_rdv = htmlspecialchars($_POST['duree']);
        
        $id = $_GET['id'];
        $date = $_GET['date'];

        // Modify the appointment information with the specified doctor ID in the URL parameters
        $editConsultationOnWebsite = $bdd->prepare('UPDATE rdv SET duree = ?, date_rdv = ? WHERE id_medecin = ? AND date_rdv = ?');
        $req = $editConsultationOnWebsite->execute(array($new_duree_rdv, $new_date_rdv, $id, $date));
        if (!$req){
            echo "Error executing UPDATE query";
        } else  {
            // Redirect to the user's page displaying medical appointments
            header('Location: afficherconsultation.php');
        }

    } else {
        $errorMsg = "Please fill in all the fields...";
    }
}
