<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/medecin/afficherstat.php');
?>


<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>Health professional statistics</h1>
        <?php 
            while($Medecin = $afficherHeureMedecin->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        Name : <?= $Medecin[0]; ?>
                        <br>
                        First Name : <?= $Medecin[1]; ?>
                        <br>
                        Number of minutes of consultation planned : <?= $Medecin[3]; ?>
                        <br>
                        <?php 
                        $heures = (int)$Medecin[3]/60;?>
                        Number of consultation hours planned : <?= $heures; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
        </div>

 </div>        
    
</body>
</html>