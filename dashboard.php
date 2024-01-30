<?php
session_start();
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}
if ($_SESSION['ROLE'] == "user") {
    header("Location: listevols.php");
    exit();
}
?>
<style type="text/css">
    .nav-link {
        color: #f9f6f6;
        font-size: 14px;
    }
</style>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compagnie Aerienne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<body>
    <nav class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-10">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="" style="color: #5b5757;"><b>Compagnie Aerienne</b></a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Hi,
                    <?php echo ucwords($_SESSION['NAME']); ?> Log out
                </a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-info sidebar" style="height: 569px">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column" style="color: #5b5757;">
                        <li class="nav-item">
                            <a class="nav-link active" href="vols.php">
                                <span data-feather="home">Modifier les vols</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                    <h1 class="h2">Utilisateurs et Admins</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($_SESSION['ROLE'] == "admin") {
                                $query = "SELECT * FROM users";
                            } else {
                                $role = $_SESSION['ROLE'];
                                $query = "SELECT * FROM users WHERE role = '$role'";
                            }
                            $result = $con->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['role'] ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<h2>No record found!</h2>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>