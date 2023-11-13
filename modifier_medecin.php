<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/medecin/infoMedecinAction.php');
    require('actions/medecin/modifierMedecinAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>
<body class="bl">
    <?php include 'inclure/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <?php 
            if(isset($medecinInfo)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label  class="form-label">Modify name</label>
                        <input type="text" class="form-control" name="nom" value="<?= $medecin_nom; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modify First name</label>
                        <input type="text" class="form-control" name="prenom" value="<?=  $medecin_prenom; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Gender</label>
                        <input type="text" class="form-control" name="civilite" value="<?= $medecin_civilite; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate">Save information</button>
                </form>
                <?php
            }
        ?>

    </div>
</body>
</html>