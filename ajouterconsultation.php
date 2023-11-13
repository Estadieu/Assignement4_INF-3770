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
            <legend>Make an appointment</legend>
            <br><br>
            <form action="ajouterconsultation.php" method="POST">
                <p>Name  <input type="text" name="nom_u" required /></p>
                <p>First Name <input type="text" name="prenom_u" required /></p>
                <p>Name Health Professionals <input type="text" name="nom_m" required /></p>
                <p>First Name Health Professionals <input type="text" name="prenom_m" required /></p>
                <p>Date <input type="datetime-local" name="dateh" required /></p>
                <p>Duration <input type="text" name="duree" required /></p>
                <p>
                    <input class="btn btn-danger" type="reset" name="reset" value="Reset ">
                    <input class="btn btn-success" type="submit" name="save" value="Add">
                </p>
            </form>
        </fieldset>

        <?php 
        require ('actions/database.php');
            if(isset($_POST['duree'] )){
                $nom_u = htmlspecialchars($_POST['nom_u']);
                $prenom_u = htmlspecialchars($_POST['prenom_u']);
                $nom_m =htmlspecialchars($_POST['nom_m']);
                $prenom_m = htmlspecialchars($_POST['prenom_m']);
                $dateh = $_POST['dateh'];
                $duree = htmlspecialchars($_POST['duree']);
                
                // Check if the user exists
                $usagerExiste = $bdd->prepare('SELECT num_secu, nom, prenom, id_usager FROM usager WHERE nom = ? AND prenom = ? ');
                $usagerExiste ->execute(array($nom_u,$prenom_u));

                
                if($usagerExiste->rowCount() !== 0){
                    // If yes, check if the doctor exists
                    $MedecinExiste = $bdd->prepare('SELECT nom, prenom, id_medecin FROM medecin WHERE nom =? AND prenom = ?');
                    $MedecinExiste ->execute(array($nom_m,$prenom_m));

                    if($MedecinExiste ->rowCount() !== 0){
                        // Check if the doctor is available
                        $consultationExiste = $bdd->prepare('SELECT m.nom, m.prenom, rdv.date_rdv
                                                     FROM rdv, medecin as m
                                                     WHERE rdv.id_medecin = m.id_medecin
                                                     AND m.nom = ?
                                                     AND m.prenom = ?
                                                     AND rdv.date_rdv = ?');
                        $consultationExiste ->execute(array($nom_m,$prenom_m,$dateh));
                        if($consultationExiste ->rowCount() == 0){
                            // Add the consultation
                            $medecin = $MedecinExiste->fetch();
                            $usager = $usagerExiste->fetch();

                            $insererConsultation = $bdd->prepare('INSERT INTO rdv(id_medecin, date_rdv, duree, id_usager) VALUES (?, ?, ?, ?)');
                            $insererConsultation ->execute(array($medecin['id_medecin'],$dateh,$duree,$usager['id_usager']));

                        } else {
                            echo "Healthcare professional is not available for the specified period";
                        }

                    } else {
                        echo "The health professional does not exist in the Database";
                    }

                } else {
                    echo "The user does not exist in the Database";
                }
            } else {
                echo "Please fill out the fields in the form";
            }	 
        ?>
    </div>
</body>

</html>
