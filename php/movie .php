<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupère l'ID du film depuis l'URL
$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prépare et exécute la requête SQL
$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = $conn->query($sql);

// Vérifie s'il y a un résultat
if ($result->num_rows > 0) {
    // Récupère les données du film
    $movie = $result->fetch_assoc();
} else {
    die("Film not found.");
}

// Ferme la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($movie['name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($movie['name']); ?></h1>
    <div class="movie-description">
        <div class="movie-image">
            <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="<?php echo htmlspecialchars($movie['name']); ?>">
        </div>
        <div class="movie-content">
            <p><strong>Type:</strong> <?php echo htmlspecialchars($movie['type']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($movie['description']); ?></p>
        </div>
    </div>
    <a href="seaechfile.php">Back to movie list</a>
</body>
</html>
