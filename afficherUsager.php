<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/usager/afficherUsagerAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>

    <div class="container">
    <h1>Bracelet users</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Search</button>
                    <a href ="ajouterUsager.php" class="btn btn-primary active">Add new user</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($usager = $afficherUsager->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <b>Name :</b> <?= $usager['nom']; ?>
                        <br>
                        <b>First Name :</b> <?= $usager['prenom']; ?>
                        <br>
                        <b>Date of birth :</b> <?= $usager['date_naiss']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_usager.php?id=<?= $usager['id_usager']; ?>" class="btn btn-warning" id ="cent">View information</a>
                        <a href="actions/usager/supprimerUsagerAction.php?id=<?= $usager['id_usager']; ?>" class="btn btn-danger" id ="cent">Delete User</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>