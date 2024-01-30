
<?php
session_start();
?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Companie Aerienne</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<?= include "header.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
<body>
  <main>
  <div class="container">
    <h2 class="textPlanning">Planning des Vols</h2><br><br>

    <h3 class="textPlanning">Villes d'Arrivée</h3><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro de vol</th>
                <th>Nom du pilote</th>
                <th>Nom de l'avion</th>
                <th>Ville d'arrivée</th>
                <th>Heure d'arrivée</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'compagnie-sjt';

            try {
                $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT vol.NV, pilote.Nom AS NomPilote, avion.Nom AS NomAvion, vol.VA, vol.HA FROM vol
                        LEFT JOIN pilote ON vol.NP = pilote.NP
                        LEFT JOIN avion ON vol.NA = avion.NA";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["NV"] . "</td>";
                    echo "<td>" . $row["NomPilote"] . "</td>";
                    echo "<td>" . $row["NomAvion"] . "</td>";
                    echo "<td>" . $row["VA"] . "</td>";
                    echo "<td>" . $row["HA"] . "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table><br><br>

    <h3 class="textPlanning">Villes de Départ</h3><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro de vol</th>
                <th>Nom du pilote</th>
                <th>Nom de l'avion</th>
                <th>Ville de départ</th>
                <th>Heure de départ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT vol.NV, pilote.Nom AS NomPilote, avion.Nom AS NomAvion, vol.VD, vol.HD FROM vol
                        LEFT JOIN pilote ON vol.NP = pilote.NP
                        LEFT JOIN avion ON vol.NA = avion.NA";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["NV"] . "</td>";
                    echo "<td>" . $row["NomPilote"] . "</td>";
                    echo "<td>" . $row["NomAvion"] . "</td>";
                    echo "<td>" . $row["VD"] . "</td>";
                    echo "<td>" . $row["HD"] . "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>
   
</body>
<?= include "footer.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
</html>