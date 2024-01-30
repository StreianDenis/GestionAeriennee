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
    if (isset($_POST['pilote_submit'])) {
        // Récupération des données du formulaire
        $num_pilote = $_POST['num_pilote'];
        $nom_pilote = $_POST['nom_pilote'];
        $adresse = $_POST['adresse'];

        // Vérification des expressions régulières pour le numéro de pilote, le nom et le prénom
        if (preg_match('#^\d+$#', $num_pilote) && preg_match('#^[A-Z][A-Za-z\é\è\ê\-]+$#', $nom_pilote)) {
            // Requête SQL de mise à jour avec des paramètres
            $sql = "INSERT INTO Pilote (NP, Nom, Adresse) VALUES (?, ?, ?)";

            // Préparation de la requête
            $stmt = mysqli_prepare($conn, $sql);

            // Liaison des paramètres
            mysqli_stmt_bind_param($stmt, "sss", $num_pilote, $nom_pilote, $adresse);

            // Exécution de la requête préparée
            if (mysqli_stmt_execute($stmt)) {
                echo "Data inserted successfully into the 'Pilote' table.";
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_pilote'])) {
        $num_pilote = $_POST['num_pilote'];

        $sql = "DELETE FROM Pilote WHERE NP = '$num_pilote'";

        if (mysqli_query($conn, $sql)) {
            echo "Data deleted successfully from 'Pilote' table.";
        } else {
            echo "Error deleting data: " . mysqli_error($conn);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_pilote'])) {

    } elseif (isset($_POST['update_pilote'])) {
        $num_pilote = $_POST['num_pilote'];
        $nom_pilote = $_POST['nom_pilote'];
        $adresse = $_POST['adresse'];

        $sql = "UPDATE Pilote SET Nom = '$nom_pilote', Adresse = '$adresse' WHERE NP = '$num_pilote'";

        if (mysqli_query($conn, $sql)) {
            echo "Data updated successfully in 'Pilote' table.";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
}
$sql_select_pilotes = "SELECT NP, Nom FROM Pilote";
$result_pilotes = mysqli_query($conn, $sql_select_pilotes);
if (!$result_pilotes) {
  die("Error fetching 'Pilote' data: " . mysqli_error($conn));
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
<main>
<form action="#" method="POST">
      <h3>Ajouter un nouveau pilote</h3>
      <div class="form-group">
        <input type="text" name="num_pilote" required placeholder="Numéro Pilote" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="nom_pilote" required placeholder="Nom Pilote" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="adresse" required placeholder="Adresse Pilote" class="form-control">
      </div>
      <div class="form-group my-3">
        <button type="submit" name="pilote_submit" class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Ajouter le pilote</button>
      </div>
    </form>
</main>
<form action="#" method="POST">
    <h3>Effacer un pilote</h3>
    <div class="form-group">
        <input type="text" name="num_pilote" required placeholder="Nombre Pilote" class="form-control">
    </div>
    <div class="form-group my-3">
        <button type="submit" name="delete_pilote" class="btn btn-danger rounded-0 d-flex justify-content-center text-center p-3">Effacer Pilote</button>
    </div>
</form>
<form action="#" method="POST">
    <h3>Modifier un pilote</h3>
    <div class="form-group">
        <select name="num_pilote" required class="form-control">
          <option value="" disabled selected>Numéro Pilote</option>
          <?php
          while ($row = mysqli_fetch_assoc($result_pilotes)) {
            echo "<option value='" . $row['NP'] . "'>" . $row['Nom'] . " (NP: " . $row['NP'] . ")</option>";
          }
          ?>
    <div class="form-group">
        <input type="text" name="nom_pilote" required placeholder="Nom Pilote" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="adresse" required placeholder="Adresse Pilote" class="form-control">
    </div>
    <div class="form-group my-3">
        <button type="submit" name="update_pilote" class="btn btn-warning rounded-0 d-flex justify-content-center text-center p-3">Modifier le pilote</button>
    </div>
</form>

</body>
<?= include "footer.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
</html>