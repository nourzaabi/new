<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.html");
    exit();
}

if (isset($_GET['signup_success']) && $_GET['signup_success'] === 'true') {
    // Set a flag to show the SweetAlert
    $showSweetAlert = true;
} else {
    // Set the flag to false if not showing SweetAlert
    $showSweetAlert = false;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie&#x1F3AC; </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lemon&family=Libre+Baskerville:wght@400;700&family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <title>Movie</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <h1>movie</h1>
            </div>
            <nav class="navBar">
                <div class="open-btn" id="open">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="nav-items">
                    <ul class="list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Movies</a></li>
                        <li><a href="#">TV Series</a></li>
                        <li><a href="#">Animated Movies</a></li>
                        <li><a href="#">My List</a></li>
                        <div class="close-btn" id="close">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </ul>
                    <ul class="user">
                    <div class="search" id="search">
                            <ul>
                                <li><input type="text"></a></li>
                            </ul>
                        </div>
                        <li id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></li>
                        <li><i class="fa-solid fa-bell"></i></li>
                        <li id="user-icon"><i class="fa-solid fa-user"></i></li>
                        <div class="menu" id="menu">
                            <ul>
                                <li><a href="../php/Logout.php">Logout</a></li>
                                <li><a href="settings.php">Settings</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <!-- SweetAlert Popup Trigger -->
    <?php if ($showSweetAlert): ?>
    <div id="signup-success-alert" class="hidden">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Signup successful!",
                    showConfirmButton: false,
                    timer: 2000 // Close automatically after 5 seconds
                });
            });
        </script>
    </div>
    <?php endif; ?>
    
    <footer class="footer">
        <div>
            <h4>Movies</h4>
            <h4>TV Series</h4>
            <h4>Animated Movies</h4>
        </div>
        <div>
            <h4>Privacy Policy</h4>
            <h4>Cookie Policy</h4>
            <h4>Terms of Use</h4>
        </div>
        <div>
            <h4>Help Center</h4>
            <h4>Support</h4>
            <h4>FAQ</h4>
        </div>
        <div>
            <h4>Follow Us</h4>
            <div class="footer-social">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
    </footer>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include OwlCarousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Include Swiper JS -->
    <script src="../js/swiper-bundle.min.js"></script>
    <!-- Include your custom JS -->
    <script src="../js/main.js"></script>

    <!-- Show SweetAlert Popup -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var signupSuccessAlert = document.getElementById("signup-success-alert");
            if (signupSuccessAlert) {
                signupSuccessAlert.classList.remove("hidden");
            }
        });
    </script>
</body>
</html>
