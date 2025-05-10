<?php
header('Content-Type: application/json');

if (!isset($_GET['q'])) {
    echo json_encode(['error' => 'Paramètre q manquant.']);
    exit;
}

$query = $_GET['q'];
$format = $_GET['format'] ?? 'json';

$url = "http://localhost:8081/search?q=" . urlencode($query) . "&format=" . $format;
$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(['error' => 'Erreur lors de l’appel à l’API Nominatim.']);
    exit;
}

echo $response;
?>

