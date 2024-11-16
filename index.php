<?php
     require('dbconfig.php');
    // if (isset($_SESSION['username']))
    //     <p>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f33e8970d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include('header.php'); ?> <!-- Include the navbar here -->
    </header>
    <div class="maincontent1">
    <div class="maincontent">  
        <div class="custom-carousel-container">      
        <div class="carousel-container">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/electronics-category.jpg" class="d-block w-100" alt="Electronics">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/books-category.jpg" class="d-block w-100" alt="Books">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/cloths-category.jpg" class="d-block w-100" alt="Cloths">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        </div>
        <div class="outer-category-container">
            <a href="get_electronics.php">
                <div class="category-container" id="electronics">
                    <span class="category-name">Electronics</span>
                </div>
            </a>
            <a href="get_cloths.php">
                <div class="category-container" id="cloths">
                    <span class="category-name">Cloths</span>
                </div>
            </a>
            <a href="get_books.php">
                <div class="category-container" id="books">
                    <span class="category-name">Books</span>
                </div>
            </a>
        </div>
    </div>
    </div>

    <footer>
        <p>&copy; 2024 Random company name. All rights reserved.</p>
    </footer>
</body>
</html>