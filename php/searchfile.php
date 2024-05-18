<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Votre nom d'utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$dbname = "movies"; // Le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Récupération du paramètre de recherche depuis l'URL
$query = isset($_GET['title']) ? $_GET['title'] : '';

if ($query) {
    // Requête SQL pour rechercher les films correspondant au titre
    $sql = $conn->prepare("SELECT title, image FROM movies WHERE title LIKE ?");
    $searchTerm = "%" . $query . "%";
    $sql->bind_param("s", $searchTerm);

    if ($sql->execute()) {
        $result = $sql->get_result();
        $movies = [];

        // Boucler à travers les résultats et les ajouter à un tableau
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }

        // Retourner les films au format JSON
        echo json_encode(['movies' => $movies]);
    } else {
        echo json_encode(['error' => "Query execution failed: " . $sql->error]);
    }
} else {
    echo json_encode(['error' => "No query parameter provided"]);
}

$conn->close();
?>
