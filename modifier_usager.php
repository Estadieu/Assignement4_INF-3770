<?php
require('actions/utilisateur/securiteAction.php');
require('actions/usager/infoUsagerAction.php');
require('actions/usager/modifierUsagerAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body class="bl">
    <?php include 'inclure/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)) { echo '<p>'.$errorMsg.'</p>'; } ?>

        <?php if(isset($usagerInfo)) { ?>
            <form method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Edit the name</label>
                            <input type="text" class="form-control form-control-sm" name="nom" value="<?= $usager_nom; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Edit the first name</label>
                            <input type="text" class="form-control form-control-sm" name="prenom" value="<?= $usager_prenom; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control form-control-sm" name="civilite" value="<?= $usager_civilite; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Change address</label>
                            <input type="text" class="form-control form-control-sm" name="adresse" value="<?= $usager_adresse; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Change postal code</label>
                            <input type="text" class="form-control form-control-sm" name="cdp" value="<?= $usager_cdp; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Change City</label>
                            <input type="text" class="form-control form-control-sm" name="ville" value="<?= $usager_ville; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Place of birth</label>
                            <input type="text" class="form-control form-control-sm" name="lieu_naiss" value="<?= $usager_lieu_naiss; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">ID user</label>
                            <input type="text" class="form-control form-control-sm" name="num_secu" value="<?= $usager_num_secu; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Date of birth</label>
                            <input type="text" class="form-control form-control-sm" name="date_naiss" value="<?= $usager_date_naiss; ?>">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="validate">Save Changes</button>
            </form>

            
            <div class="chart-container">
                <div class="chart-column">
                    <canvas id="numSecuChart" width="200" height="150"></canvas>
                </div>
                <div class="chart-column">
                    <canvas id="heartRate" width="200" height="150"></canvas>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var stepsData = [
                <?= $usager_num_secu0; ?>,
                <?= $usager_num_secu1; ?>,
                <?= $usager_num_secu2; ?>,
                <?= $usager_num_secu3; ?>,
                <?= $usager_num_secu4; ?>,
                <?= $usager_num_secu5; ?>,
                <?= $usager_num_secu6; ?>
            ];

            var heartRateData = [
                <?= $heartRateMonday; ?>,
                <?= $heartRateTuesday; ?>,
                <?= $heartRateWednesday; ?>,
                <?= $heartRateThursday; ?>,
                <?= $heartRateFriday; ?>,
                <?= $heartRateSaturday; ?>,
                <?= $heartRateSunday; ?>
            ];
            
            
            var ctx = document.getElementById("numSecuChart").getContext("2d");

            
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    datasets: [
                        {
                            label: "Number of Steps",
                            data: stepsData,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            var ctx = document.getElementById("heartRate").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    datasets: [
                        {
                            label: "Average heartbeat",
                            data: heartRateData,
                            backgroundColor: "rgb(240, 128, 128)",
                            borderColor: "rgba(0,0,0)",
                            borderWidth: 2,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>
</body>
</html>
