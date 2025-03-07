<?php
// functions.php
require 'config.php';

function getProjects($page = 1, $perPage = 6) {
    global $pdo;

    // Calculer l'offset pour la pagination
    $offset = ($page - 1) * $perPage;

    // Récupérer les projets
    $sql = "SELECT * FROM projects LIMIT :perPage OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalProjects() {
    global $pdo;

    // Récupérer le nombre total de projets
    $sql = "SELECT COUNT(*) as total FROM projects";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
?>