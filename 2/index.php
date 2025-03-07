<?php
// Inclure les fichiers nécessaires
require 'config.php';
require 'functions.php';

// Récupérer le numéro de page depuis l'URL (par défaut : page 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 6; // Nombre de projets par page

// Récupérer les projets pour la page actuelle
$projects = getProjects($page, $perPage);

// Récupérer le nombre total de projets
$totalProjects = getTotalProjects();

// Calculer le nombre total de pages
$totalPages = ceil($totalProjects / $perPage);
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
                    <span class="subheading">Our Global Work Industries</span>
                    <h2 class="mb-4">Latest Projects</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($projects as $project): ?>
                    <div class="col-md-4">
                        <div class="project">
                            <a href="images/<?= htmlspecialchars($project['image_url']) ?>" class="img image-popup d-flex align-items-center" style="background-image: url(images/<?= htmlspecialchars($project['image_url']) ?>);">
                                <div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
                            </a>
                            <div class="text">
                                <span class="subheading"><?= htmlspecialchars($project['category']) ?></span>
                                <h3><?= htmlspecialchars($project['title']) ?></h3>
                                <p><span class="fa fa-map-marker mr-1"></span> <?= htmlspecialchars($project['location']) ?></p>
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