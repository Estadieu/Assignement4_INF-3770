<?php
require('actions/database.php');

// Form validation
if(isset($_POST['validate'])){

    // Check if the fields are filled
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse'])){

        // Data to be used in the query
        $new_usager_nom = htmlspecialchars($_POST['nom']);
        $new_usager_prenom = htmlspecialchars($_POST['prenom']);
        $new_usager_civilite = htmlspecialchars($_POST['civilite']);
        $new_usager_adresse = htmlspecialchars($_POST['adresse']);
        $new_usager_cdp = htmlspecialchars($_POST['cdp']);
        $new_usager_ville = htmlspecialchars($_POST['ville']);
        $new_usager_lieu_naiss = htmlspecialchars($_POST['lieu_naiss']);
        $new_usager_num_secu = htmlspecialchars($_POST['num_secu']);
        $new_usager_date_naiss = date($_POST['date_naiss']);
        
        $id = $_GET['id'];

        // Modify the information of the user with the specified ID in the URL parameters
        $editusagerOnWebsite = $bdd->prepare('UPDATE usager SET nom = ?, prenom = ?, civilite = ?, adresse = ?, cdp = ?, ville = ?, lieu_naiss = ?, num_secu = ?, date_naiss = ? WHERE id_usager = ?');
        $req = $editusagerOnWebsite->execute(array($new_usager_nom, $new_usager_prenom, $new_usager_civilite, $new_usager_adresse, $new_usager_cdp,$new_usager_ville,$new_usager_lieu_naiss,$new_usager_num_secu,$new_usager_date_naiss, $id));
        if (!$req){
            echo "Error executing UPDATE query";
        } else {
            // Redirect to the user's page displaying users
            header('Location: afficherusager.php');
        }
        

    } else {
        $errorMsg = "Please fill in all the fields...";
    }

}
