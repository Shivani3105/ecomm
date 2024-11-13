<?php
    require('dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7f33e8970d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="electronics.php">Electronics</a></li>
                <li><a href="cloths.php">Cloths</a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
            <div class="logo">
                <h1>logo</h1>
            </div>
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="search here"><button type="submit" class="go-bttn">Go</button>
            </div>
            <div class="user-profile">
                <i class="fa-regular fa-user"></i>
            </div>

        </nav>
    </header>
    <main>
        <div class="outer-category-container">
            <a href="electronics.php">
                <div class="category-container" id="electronics">
                    <span class="category-name">
                        Electronics
                    </span>
                </div>
                
            </a>
            <a href="cloths.php">
                <div class="category-container" id="cloths">
                    <span class="category-name">
                        Cloths
                    </span>
                </div>
            </a>
            <a href="books.php">
                <div class="category-container" id="books">
                    <span class="category-name">
                        Books
                    </span>
                </div> 
            </a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Random company name. All rights reserved.</p>
    </footer>
</body>
</html>