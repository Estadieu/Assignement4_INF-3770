<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/medecin/afficherMedecinAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>Health professionals</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Search</button>
                    <a href ="ajouterMedecin.php" class="btn btn-primary active">Add a healthcare professional</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($Medecin = $afficherMedecin->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                       <b>Name : </b> <?= $Medecin['nom']; ?>
                        <br>
                        <b>First Name : </b> <?= $Medecin['prenom']; ?>
                        <br>
                        <b>Gender :</b> <?= $Medecin['civilite']; ?>
                        <br>
                        <b>ID professional : </b> <?= $Medecin['id_medecin']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_medecin.php?id=<?= $Medecin['id_medecin']; ?>" class="btn btn-warning" id ="cent">View information</a>
                        <a href="actions/medecin/supprimerMedecinAction.php?id=<?= $Medecin['id_medecin']; ?>" class="btn btn-danger" id ="cent">Delete healthcare professional</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>