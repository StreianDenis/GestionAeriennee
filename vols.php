<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'compagnie-sjt';
session_start();

if(!$_SESSION['ID'] && $_SESSION['ROLE'] != "admin"){
  header("Location:login.php");
}

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection to the database failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vol_submit'])) {
        // Récupération des données du formulaire
        $num_vol = $_POST['num_vol'];
        $num_pilote = $_POST['num_pilote'];
        $num_avion = $_POST['num_avion'];
        $vol_depart = $_POST['vol_depart'];
        $vol_arrivee = $_POST['vol_arrivee'];
        $heure_depart = $_POST['heure_depart'];
        $heure_arrivee = $_POST['heure_arrivee'];
        $data_vol = $_POST['data_vol'];

        // Vérification des expressions régulières pour le numéro de vol, les villes, les heures et la date
        if (
            preg_match('#^\d+$#', $num_vol) &&
            preg_match('#^[A-Za-z\é\è\ê\-]+$#', $vol_depart) &&
            preg_match('#^[A-Za-z\é\è\ê\-]+$#', $vol_arrivee) &&
            preg_match('#^\d{2}:\d{2}$#', $heure_depart) &&
            preg_match('#^\d{2}:\d{2}$#', $heure_arrivee) &&
            preg_match('#^\d{4}-\d{2}-\d{2}$#', $data_vol)
        ) {
            // Requête SQL de mise à jour avec des paramètres
            $sql = "INSERT INTO Vol (NV, NP, NA, VD, VA, HD, HA, DataVol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Préparation de la requête
            $stmt = mysqli_prepare($conn, $sql);

            // Liaison des paramètres
            mysqli_stmt_bind_param($stmt, "ssssssss", $num_vol, $num_pilote, $num_avion, $vol_depart, $vol_arrivee, $heure_depart, $heure_arrivee, $data_vol);

            // Exécution de la requête préparée
            if (mysqli_stmt_execute($stmt)) {
                echo "Data inserted successfully into the 'Vol' table.";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }

            // Fermeture du statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Invalid input format.";
        }
    }
  }
  
$sql_select_vol = "SELECT * FROM Vol";
$result = mysqli_query($conn, $sql_select_vol);

$sql_select_pilotes = "SELECT NP, Nom FROM Pilote";
$result_pilotes = mysqli_query($conn, $sql_select_pilotes);
if (!$result_pilotes) {
  die("Error fetching 'Pilote' data: " . mysqli_error($conn));
}

$sql_select_avions = "SELECT NA, Nom FROM Avion";
$result_avions = mysqli_query($conn, $sql_select_avions);
if (!$result_avions) {
  die("Error fetching 'Avion' data: " . mysqli_error($conn));
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vol_delete_submit'])) {
  $num_vol_to_delete = $_POST['num_vol_to_delete'];

  // Requête SQL de suppression avec des paramètres
  $sql_delete = "DELETE FROM Vol WHERE NV = ?";

  // Préparation de la requête
  $stmt_delete = mysqli_prepare($conn, $sql_delete);

  // Liaison des paramètres
  mysqli_stmt_bind_param($stmt_delete, "s", $num_vol_to_delete);

  // Exécution de la requête préparée
  if (mysqli_stmt_execute($stmt_delete)) {
      echo "Data deleted successfully from 'Vol' table.";
  } else {
      echo "Error deleting data: " . mysqli_error($conn);
  }

  // Fermeture du statement de suppression
  mysqli_stmt_close($stmt_delete);
}

mysqli_close($conn);
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
<body>
  <main><br><br>
    <form action="#" method="POST">
      <h3>Ajouter un nouveau vol</h3>
      <div class="form-group">
        <input type="text" name="num_vol" required placeholder="Numéro Vol" class="form-control">
      </div>
      <div class="form-group">
        <select name="num_pilote" required class="form-control">
          <option value="" disabled selected>Numéro Pilote</option>
          <?php
          while ($row = mysqli_fetch_assoc($result_pilotes)) {
            echo "<option value='" . $row['NP'] . "'>" . $row['Nom'] . " (NP: " . $row['NP'] . ")</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <select name="num_avion" required class="form-control">
          <option value="" disabled selected>Numéro Avion</option>
          <?php
          while ($row = mysqli_fetch_assoc($result_avions)) {
            echo "<option value='" . $row['NA'] . "'>" . $row['Nom'] . " (NA: " . $row['NA'] . ")</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <input type="text" name="vol_depart" required placeholder="Ville Départ" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="vol_arrivee" required placeholder="Ville Arrivée" class="form-control">
      </div>
      <div class="form-group">
        <input type="time" name="heure_depart" required placeholder="Heure Départ" class="form-control">
      </div>
      <div class="form-group">
        <input type="time" name="heure_arrivee" required placeholder="Heure Arrivée" class="form-control">
      </div>
      <div class="form-group">
        <input type="date" name="data_vol" required class="form-control">
      </div>
      <div class="form-group my-3">
        <button type="submit" name="vol_submit"
          class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Ajouter le vol</button>
      </div>
    </form>
    </div>
    <form action="#" method="POST">
    <h3>Supprimer un vol</h3>
    <div class="form-group">
        <select name="num_vol_to_delete" required class="form-control">
            <option value="" disabled selected>Sélectionner un vol à supprimer</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['NV'] . "'>" . $row['NV'] . " (Départ: " . $row['VD'] . ", Arrivée: " . $row['VA'] . ")</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group my-3">
        <button type="submit" name="vol_delete_submit"
            class="btn btn-danger rounded-0 d-flex justify-content-center text-center p-3">Supprimer le vol</button>
    </div>
</form>
  </main>
</body>
<?= include "footer.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
</html>