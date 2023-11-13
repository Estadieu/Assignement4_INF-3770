<?php
require('actions/database.php');

// Retrieve all appointments by default without search
$afficherconsultation = $bdd->query('SELECT u.nom, u.prenom, date_rdv, m.nom, m.prenom, duree, rdv.id_medecin
                                     FROM rdv, medecin as m, usager as u 
                                     WHERE rdv.id_medecin = m.id_medecin
                                     AND rdv.id_usager = u.id_usager
                                     ORDER BY date_rdv DESC');

// Check if a search has been entered by the user
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    // Search term
    $consultationRecherche = $_GET['recherche'];

    // Retrieve appointments that match the search
    $afficherconsultation = $bdd->query('SELECT u.nom, u.prenom, date_rdv, m.nom, m.prenom, duree, rdv.id_medecin
                                        FROM rdv, medecin as m, usager as u 
                                        WHERE rdv.id_medecin = m.id_medecin
                                        AND rdv.id_usager = u.id_usager
                                        AND m.nom LIKE "%'.$consultationRecherche.'%"
                                        ORDER BY date_rdv');
}
