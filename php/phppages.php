<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Le nom d'utilisateur par défaut de MySQL avec XAMPP est "root"
$password = ""; // Le mot de passe par défaut de MySQL avec XAMPP est ""
$dbname = "movie";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupère l'ID du film depuis l'URL
$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prépare et exécute la requête SQL
$sql = "SELECT * FROM movies WHERE id = $idM";
$result = $conn->query($sql);

// Vérifie s'il y a un résultat
if ($result->num_rows > 0) {
    // Récupère les données du film
    $movies = $result->fetch_assoc();
} else {
    die("Film not found.");
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Ferme la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($movies['Name']); ?></title>
    <link rel="stylesheet" href="searchfile.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($movies['Name']); ?></h1>
    <div class="movie-description">
        <div class="movie-image">
            <img src="<?php echo htmlspecialchars($movies['pic']); ?>" alt="<?php echo htmlspecialchars($movies['Name']); ?>">
        </div>
        <div class="movie-content">
            <p><strong>Type:</strong> <?php echo htmlspecialchars($movies['Type']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($movies['Desc']); ?></p>
        </div>
    </div>
  
</body>
</html>
