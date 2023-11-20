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
            <legend>Add a new user</legend>
            <br><br>
            <form action="ajouterUsager.php" method="POST">
                <p>  LAST NAME <input type="text" name="nom" required /></p>
                <p>  FIRST NAME <input type="text" name="prenom" required /></p>
                <p>  GENDER <input type="text" name="civilite" required /></p>
                <p>  ADDRESS <input type="text" name="adresse" required /></p>
                <p>  ZIP CODE <input type="text" name="cdp" required /></p>
                <p>  TOWN <input type="text" name="ville" required /></p>
                <p>  PLACE OF BIRTH <input type="text" name="lieu_naiss" required /></p>
                <p>  DATE OF BIRTH <input type="date" name="date_naiss" required /></p>
                <p>  USER ID <input type="text" name="num_secu" required /></p>
                <p>  Health Professional ID <input type="text" name="id_med" /></p>
                <p>
                    <input class="btn btn-danger" type="reset" name="reset" value="Reset">
                    <input class="btn btn-success" type="submit" name="save" value="Save">
                </p>
            </form>
        </fieldset>

        <?php 
        require ('actions/database.php');
            if(isset($_POST['num_secu'] )){
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $civilite =htmlspecialchars($_POST['civilite']);
                $adresse =htmlspecialchars($_POST['adresse']);
                $cdp =htmlspecialchars($_POST['cdp']);
                $ville =htmlspecialchars($_POST['ville']);
                $lieu_naiss =htmlspecialchars($_POST['lieu_naiss']);
                $date_naiss = $_POST['date_naiss'];
                $num_secu =htmlspecialchars($_POST['num_secu']);
                $id_med =htmlspecialchars($_POST['id_med']);

                // Check if the user exists in the Database
                $UtilisateurExiste = $bdd->prepare('SELECT num_secu FROM usager WHERE num_secu =? ');
                $req = $UtilisateurExiste ->execute(array($num_secu));
                if (!$req){
                    echo "Error SELECT execute";
                }

                if($UtilisateurExiste->rowCount() == 0){
                        // Insert the user into the database
                        // Takes into account if the referring professional is entered or not 
                        if(!empty($_POST['id_med'])){

                            $insererUsager = $bdd->prepare('INSERT INTO usager(nom, prenom, civilite, adresse, cdp, ville, lieu_naiss, date_naiss, num_secu, id_medecin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
                            $req = $insererUsager ->execute(array($nom,$prenom,$civilite,$adresse,$cdp,$ville,$lieu_naiss,$date_naiss,$num_secu,$id_med));
                            if (!$req){
                                echo "Error 1.1 SELECT execute";
                            } else {
                                echo "Successfully added"; 
                            }
                        } else {
                            $insererUsager = $bdd->prepare('INSERT INTO usager(nom, prenom, civilite, adresse, cdp, ville, lieu_naiss, date_naiss, num_secu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
                            $req = $insererUsager ->execute(array($nom,$prenom,$civilite,$adresse,$cdp,$ville,$lieu_naiss,$date_naiss,$num_secu));
                            if (!$req){
                                echo "Error 1.2 SELECT execute";
                            } else {
                                echo "Add well"; 
                            }
                        }
                } else {
                    echo "User already in the database";
                }
            } else {
                echo "Please fill out the fields in the form";
            }	
        ?>
    </div>
</body>

</html>
