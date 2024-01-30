<?php
session_start();
if (isset($_SESSION['ID'])) {
    header("Location:listevols.php");
    exit();
}
include_once('config.php');

if (isset($_POST['submit'])) {
    $errorMsg = "";
    $email =  htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($email) && !empty($password)) {
        
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Vérifier le mot de passe hashé
            if (password_verify($password, "$2a$12$".$row['password'])) {
                $_SESSION['ID'] = $row['id'];
                $_SESSION['ROLE'] = $row['role'];
                $_SESSION['NAME'] = $row['name'];
                header("Location:dashboard.php");
            } else {
                $errorMsg = "Mot de passe incorrect!";
            }
        } else {
            $errorMsg = "Ce compte n'existe pas";
        }
    } else {
        $errorMsg = "L'email et le mot de passe sont requis";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card text-center" style="padding:20px;">
        <h3>Connexion</h3>
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $errorMsg; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    
                        <input type="submit" name="submit" class="btn btn-success" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>