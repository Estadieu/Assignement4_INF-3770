<?php
require('actions/database.php');

// Retrieve all healthcare professionals by default without search
$afficherMedecin = $bdd->query('SELECT nom, prenom, civilite, id_medecin FROM medecin ORDER BY nom DESC');

// Check if a search has been entered by the user
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    // Search term
    $MedecinRecherche = $_GET['recherche'];

    // Retrieve healthcare professionals that match the search
    $afficherMedecin = $bdd->query('SELECT nom, prenom, civilite, id_medecin  FROM medecin WHERE nom LIKE "%'.$MedecinRecherche.'%" ORDER BY nom');
}
