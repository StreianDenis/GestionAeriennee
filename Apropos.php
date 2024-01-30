<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>À Propos de Nous - SkyVoyager Airlines</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?= include "header.php" ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4 mb-4">Bienvenue à SkyVoyager Airlines</h1>
        <p class="lead">
          Chez SkyVoyager Airlines, nous croyons que le voyage aérien va au-delà du simple déplacement d'un endroit à un autre. C'est une expérience, une aventure, une histoire en constante évolution dans les cieux.
        </p>
        <p>
          Fondée sur la passion du vol et l'engagement envers l'excellence, notre compagnie aérienne s'efforce de repousser les limites de l'aviation. Nous sommes plus qu'une compagnie aérienne ; nous sommes vos partenaires de voyage, vous emmenant vers de nouveaux horizons avec style, confort et innovation.
        </p>
        <blockquote class="blockquote mt-4">
          <p class="mb-0">"Chez SkyVoyager, chaque vol est une occasion de créer des souvenirs inoubliables dans les cieux."</p><br>
          <p class="blockquote-footer">L'équipe de SkyVoyager Airlines</p>
        </blockquote>
        <p class="mt-4">
          Notre flotte d'avions modernes est conçue pour offrir une expérience de vol exceptionnelle. Des cabines spacieuses aux divertissements de pointe, chaque détail est soigneusement pensé pour rendre votre voyage agréable et mémorable.
        </p>
        <p>
          Nous sommes fiers de notre équipe dévouée de professionnels de l'aviation qui partagent une vision commune : rendre chaque voyage aussi extraordinaire que possible. Le service chaleureux, la sécurité et la ponctualité sont nos priorités absolues.
        </p>
        <p>
          Explorez le monde avec SkyVoyager Airlines, où chaque départ est une nouvelle aventure. Merci de faire partie de notre histoire en constante évolution. Nous sommes impatients de vous accueillir à bord.
        </p>
      </div>
    </div>
  </main>
<?= include "footer.php" ?>
</body>
</html>
