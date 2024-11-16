<?php
require('dbconfig.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f33e8970d.js" crossorigin="anonymous"></script>
</head>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="logo">
                    <h1>AGS</h1>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="get_electronics.php">Electronics</a></li>
                    <li class="nav-item"><a class="nav-link" href="get_cloths.php">Cloths</a></li>
                    <li class="nav-item"><a class="nav-link" href="get_books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                </ul>
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search here" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Go</button>
                </form>
                <div class="user-profile ms-3">
                    <i class="fa-regular fa-user" aria-hidden="true"></i>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <p class="d-inline-block" style="font-size: 12px;"><?= htmlspecialchars($_SESSION['firstname']) . ' ' . htmlspecialchars($_SESSION['lastname']); ?></p>
                        
                        <a href="logout.php" style="font-size: 12px;">Log out</a>
                    <?php else: ?>
                        <a href="login.php" style="font-size: 12px;">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    
</body>
</html>
