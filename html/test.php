<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tst.css">
    <title>Movies List</title>
    <style>
        .movie-card {
            position: relative;
            width: 200px;
            height: 300px; /* Taille de la carte, ajustez selon vos besoins */
            background-color: #101116;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .movie-image {
            width: 100%;
            height: 50%; /* Ajuster la hauteur pour occuper seulement la moitié supérieure */
            object-fit: cover;
        }

        .movie-card-content {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            flex-grow: 1;
        }

        .movie-card-title {
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
        }

        .movie-card-description {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="movies-list">
    <?php
    // Step 1: Connect to the database using PDO
    $servername = "localhost";
    $username = "root"; // default username for XAMPP
    $password = "";     // default password for XAMPP
    $dbname = "Movie"; // Change this to your database name

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Step 2: Fetch movie details from the database
    $idM = 7; // You can change this to the ID of the movie you want to display
    $sql = "SELECT * FROM movies WHERE idM = :idM";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idM', $idM);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    // Step 3: Display the movie details
    if ($movie) {
        $pic_path = $movie["pic"];
        echo '<div class="movie-card">';
        echo '<iframe src="' . $pic_path . '" frameborder="0" class="movie-image"></iframe>';
        echo '<div class="movie-card-content">';
        echo '<h2 class="movie-card-title">' . $movie["Name"] . '</h2>';
        echo '<p class="movie-card-description">' . $movie["Desc"] . '</p>';
        echo '</div></div>';
    } else {
        echo "Movie not found";
    }

    // Close the connection
    $conn = null;
    ?>
    </div>
</body>
</html>
