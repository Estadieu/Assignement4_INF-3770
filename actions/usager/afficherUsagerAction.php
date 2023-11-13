<?php
require('actions/database.php');

// Retrieve all users by default without search
$afficherUsager = $bdd->query('SELECT nom, prenom, date_naiss, id_usager FROM usager ORDER BY nom DESC');

// Check if a search has been entered by the user
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    // Search term
    $usagerRecherche = $_GET['recherche'];

    // Retrieve users that match the search
    $afficherUsager = $bdd->query('SELECT nom, prenom, date_naiss, id_usager FROM usager WHERE nom LIKE "%'.$usagerRecherche.'%" ORDER BY nom');
}
