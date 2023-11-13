<?php require 'actions/utilisateur/connectionAction.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body class="bl">

</br></br>

        <form class="container1" method="POST" id ="con">
            <?php if (isset($errorMsg)) {echo '<p>' .$errorMsg. '</P>';} ?>

            <div class ="mb-3">
                    <label class="form-label"> Pseudo</label>
                    <input type="text" class = "form-control" name ="pseudo">
            </div>
            <div class ="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class = "form-control" name ="mdp">
            </div>
            <button type ="submit" class="btn btn-primary" name="validate">Login</button>
            <br><br>
        </from>
</body>
</html>