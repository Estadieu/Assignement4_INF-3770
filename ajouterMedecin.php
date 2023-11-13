<?php require('actions/utilisateur/securiteAction.php');?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<?php include 'inclure/head.php'; ?>
	
<body class="bl">
    <?php include 'inclure/navbar.php'; ?>
    <div class="container">
        <br/>
        <fieldset>
            <legend>Enter a Doctor</legend>
            <br><br>
            <form action="ajouterMedecin.php" method="POST">
                <p>LAST NAME <input type="text" name="nom" required /></p>
                <p>FIRST NAME <input type="text" name="prenom" required /></p>
                <p>TITLE <input type="text" name="civilite" required /></p>
                <p>
                    <input class="btn btn-danger" type="reset" name="reset" value="Reset ">
                    <input class="btn btn-success" type="submit" name="save" value="Add">
                </p>
            </form>
        </fieldset>

        <?php 
        require ('actions/database.php');
            if(isset($_POST['civilite'] )){
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $civilite =htmlspecialchars($_POST['civilite']);
                
                // Check if the professional already exists in the Database
                $MedecinExiste = $bdd->prepare('SELECT nom, prenom FROM medecin WHERE nom =? AND prenom = ?');
                $req = $MedecinExiste ->execute(array($nom,$prenom));
                if (!$req){
                    echo "Error SELECT execute";
                }

                if($MedecinExiste->rowCount() == 0){
                    // Insert the professional into the database
                    $insererMedecin = $bdd->prepare('INSERT INTO medecin(nom, prenom, civilite) VALUES (?, ?, ?)');
                    if(!$insererMedecin){
                        echo "Error prepare";
                    }
                    $req = $insererMedecin ->execute(array($nom,$prenom,$civilite));
                    if (!$req){
                        echo "Error SELECT execute";
                    } else {
                        echo "Successfully added";
                    }
                } else {
                    echo "The professional is already in the database";
                }
            } else {
                echo "Please fill out the form fields";
            }	
        ?>
    </div>
</body>

</html>
