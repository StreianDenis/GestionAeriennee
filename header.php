<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<img src="Images/logo.jpg" height="60" alt="MDB Logo">

    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Apropos.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listevols.php">Liste des vols</a>
          </li>
          <?php if(isset($_SESSION['ID']) && $_SESSION['ROLE'] === "admin"): ?>
            <li class="nav-item">
              <a class="nav-link" href="pilotes.php">pilotes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vols.php"> vols</a>
            </li>
          <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link disabled">Meileur moment pour voyager</a>
          </li>
        </ul>
        <?php if(!isset($_SESSION['ID'])): ?>
        <a class="btn btn-primary" href="login.php" role="button">Connexion</a>
        <?php else: ?>     
        <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
        <?php endif; ?>       
  </nav>
</header>