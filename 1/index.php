<?php
// Inclure les fichiers nécessaires
require 'config.php';
require 'functions.php';

// Récupérer le numéro de page depuis l'URL (par défaut : page 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 9; // Nombre de gardiens par page

// Récupérer les gardiens pour la page actuelle
$gardiens = getGardiens($page, $perPage);

// Récupérer le nombre total de gardiens
$totalGardiens = getTotalGardiens();

// Calculer le nombre total de pages
$totalPages = ceil($totalGardiens / $perPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Gardien</span>
                    <h2 class="mb-4">Nos Gardiens</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($gardiens as $gardien): ?>
                    <div class="col-md-4">
                        <div class="services-wrap ftco-animate">
                            <div class="img" style="background-image: url(images/<?= htmlspecialchars($gardien['image_url']) ?>);"></div>
                            <div class="text">
                                <h2><?= htmlspecialchars($gardien['nom']) ?> <?= htmlspecialchars($gardien['prenom']) ?></h2>
                                <p>Missions : <?= htmlspecialchars($gardien['missions_realisees']) ?></p>
                                <p>Notes : <?= htmlspecialchars($gardien['note_moyenne']) ?></p>
                                <a href="profil_gardien.php?id=<?= $gardien['id'] ?>" class="btn-custom">Voir Profil</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <!-- Lien vers la page précédente -->
                            <li><a href="?page=<?= max(1, $page - 1) ?>">&lt;</a></li>

                            <!-- Liens des pages -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="<?= $i === $page ? 'active' : '' ?>">
                                    <a href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Lien vers la page suivante -->
                            <li><a href="?page=<?= min($totalPages, $page + 1) ?>">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="js/google-map.js"></script>
		
		<script src="js/main.js"></script>
</body>
</html>