<?php
// functions.php
require 'config.php';

function getGardiens($page = 1, $perPage = 9) {
    global $pdo;

    // Calculer l'offset pour la pagination
    $offset = ($page - 1) * $perPage;

    // Récupérer les gardiens
    $sql = "SELECT * FROM gardiens LIMIT :perPage OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalGardiens() {
    global $pdo;

    // Récupérer le nombre total de gardiens
    $sql = "SELECT COUNT(*) as total FROM gardiens";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
?>