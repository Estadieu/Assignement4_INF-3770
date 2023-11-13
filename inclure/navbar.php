<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">VitalTrack</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
          //Acces website
          if(isset($_SESSION['auth'])){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="afficherUsager.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherMedecin.php">Health professional</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherConsultation.php">Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherStatistique.php">statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="actions/utilisateur/deconnexion.php">Logout</a>
            </li>
            <?php
          }else{
            //if not connectionpage
            ?>
          <li class="nav-item">
            <a class="nav-link" href="connection.php">Login</a>
          </li>
          <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>