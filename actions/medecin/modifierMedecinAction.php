<?php
require('actions/database.php');

// Form validation
if(isset($_POST['validate'])){

    // Check if the fields are filled
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['civilite'])){

        // Data to be used in the query
        $new_medecin_nom = htmlspecialchars($_POST['nom']);
        $new_medecin_prenom = htmlspecialchars($_POST['prenom']);
        $new_medecin_civilite = htmlspecialchars($_POST['civilite']);
    
        $id = $_GET['id'];

        // Modify the information of the professional with the ID specified in the URL parameters
        $editmedecinOnWebsite = $bdd->prepare('UPDATE medecin SET nom = ?, prenom = ?, civilite = ? WHERE id_medecin = ?');
        $req = $editmedecinOnWebsite->execute(array($new_medecin_nom, $new_medecin_prenom, $new_medecin_civilite, $id));
        if (!$req){
            echo "Error executing UPDATE query";
        } else  {
            // Redirect to the display page
            header('Location: affichermedecin.php');
        }

    } else {
        $errorMsg = "Please fill in all the fields...";
    }

}
