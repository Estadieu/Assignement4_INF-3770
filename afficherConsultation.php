<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/consultation/afficherconsultationAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>User meetings</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Search</button>
                    <a href ="ajouterconsultation.php" class="btn btn-primary active">Add an appointment</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($consultation = $afficherconsultation->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <b>Name :</b> <?= $consultation[0]; ?>
                        <b>First name :</b> <?= $consultation[1]; ?>
                        <br>
                        <b>Name professional :</b> <?= $consultation[3]; ?>
                        <b>First name professional :</b> <?= $consultation[4]; ?>
                        <br>
                        <b>Appointment date :</b> <?= $consultation['date_rdv']; ?>
                        <br>
                        <b>Duration</b> : <?= $consultation['duree']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_consultation.php?date=<?= $consultation['date_rdv']; ?> &id= <?=$consultation[6]; ?>" class="btn btn-warning" id ="cent">Edit appointment</a>
                        <a href="actions/consultation/supprimerConsultationAction.php?date=<?= $consultation['date_rdv']; ?> &id= <?=$consultation[6]; ?>" class="btn btn-danger" id="cent">Delete appointment</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>