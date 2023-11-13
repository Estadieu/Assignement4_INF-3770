<?php
require ('actions/database.php');

//Collects professionals who have appointments and adds up all the durations of their consultations
$afficherHeureMedecin = $bdd->query('SELECT m.nom,m.prenom, rdv.id_medecin , sum(duree) FROM medecin as m, rdv WHERE m.id_medecin = rdv.id_medecin group by m.nom, m.prenom, rdv.id_medecin ');
