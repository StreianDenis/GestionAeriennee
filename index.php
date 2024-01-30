<?php
session_start();
?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Companie Aerienne</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/carosel1.jpg" class="d-block w-75 mx-auto" alt="..." height="900px">
    </div>
    <div class="carousel-item">
      <img src="Images/carosel2.jpg" class="d-block w-75 mx-auto" alt="..." height="900px">
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="row">
        <div class="col-12">
          <h1>Bienvenue à notre Compagnie Aérienne</h1>
          <p>
            SkyVoyager Airlines : Fondée sur la vision audacieuse de rendre chaque voyage aérien exceptionnel, SkyVoyager Airlines s'impose comme une compagnie aérienne de renom, offrant bien plus qu'un simple moyen de transport. Embrassant l'idée que le voyage commence dès l'embarquement, SkyVoyager se distingue par son engagement envers l'excellence, l'innovation et le service client.

À bord de nos avions modernes, les passagers découvrent un monde où le confort et le style convergent. Les cabines spacieuses sont conçues avec une attention méticuleuse aux détails, offrant un espace personnel généreux, des sièges ergonomiques et des divertissements de pointe. Des menus gastronomiques préparés par des chefs renommés ajoutent une touche culinaire raffinée à l'expérience de vol, transformant chaque repas en un festin céleste.

Notre personnel, soigneusement sélectionné et formé, incarne la philosophie de service de SkyVoyager. Attentifs, courtois et professionnels, ils veillent à ce que chaque passager se sente non seulement accueilli, mais choyé tout au long du voyage. Nous croyons que le service exceptionnel crée des souvenirs durables, et c'est cette conviction qui guide chaque interaction avec nos passagers.
          </p>
          <p>
          SkyVoyager Airlines ne se contente pas de relier des destinations, mais aspire à créer des connexions mémorables entre les personnes. Nos itinéraires étendus et notre réseau mondial permettent aux voyageurs de découvrir des cultures diverses et des paysages époustouflants. Que ce soit pour affaires ou pour le plaisir, SkyVoyager offre des options flexibles et des services personnalisés pour répondre aux besoins de chaque voyageur.

En tant que pionniers de l'aviation moderne, nous nous engageons également envers la durabilité environnementale. En investissant dans des technologies écoénergétiques et en adoptant des pratiques responsables, SkyVoyager Airlines s'efforce de réduire son impact sur l'environnement tout en continuant d'offrir des voyages exceptionnels.

Rejoignez-nous à bord de SkyVoyager Airlines, où chaque vol est une aventure, chaque voyageur est un invité de choix, et chaque instant est une occasion de créer des souvenirs inoubliables dans les cieux.
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h2>Nos Avions</h2>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="Images/carosel1.jpg" class="card-img-top" alt="Avion 1">
            <div class="card-body">
              <h5 class="card-title">H225 M / EC 725 Caracal. Airbus </h5>
              <p class="card-text">
              Ce géant des airs incarne le luxe et le confort dans le ciel. Avec ses deux étages spacieux et ses hublots panoramiques, l'A380 offre une expérience de vol exceptionnelle, redéfinissant les normes du voyage aérien à grande échelle.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="Images/carosel2.jpg" class="card-img-top" alt="Avion 2">
            <div class="card-body">
              <h5 class="card-title">A400 M « Atlas » C-130 Hercules.</h5>
              <p class="card-text">
              Cet avion emblématique de la Seconde Guerre mondiale est agile comme un danseur et rapide comme l'éclair. Sa silhouette fuselée et ses ailes élégamment incurvées en font un symbole de la bravoure aérienne britannique.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="Images/carosel3.jpg" class="card-img-top" alt="Avion 3" height="650px">
            <div class="card-body">
              <h5 class="card-title">Rafale. Alphajet. Mirage 2000-5</h5>
              <p class="card-text">
              Chasseur furtif de pointe, le F-22 est une merveille technologique. Ses lignes aérodynamiques agressives et sa capacité à manœuvrer à des vitesses impressionnantes en font l'un des chasseurs les plus redoutables au monde, assurant la supériorité aérienne où qu'il aille.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  </body>
  <?= include "footer.php" ?>
</body>
</html>
  </html>