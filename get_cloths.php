<?php
 include('header.php');
require 'dbconfig.php'; // Include the database connection

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$sql = "SELECT * FROM product WHERE category='Cloths'";
$result = mysqli_query($conn, $sql); // Use mysqli_query for procedural style

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$products = [];

if (mysqli_num_rows($result) > 0) {
    // Fetch all products
    while ($row = mysqli_fetch_assoc($result)) { // Use mysqli_fetch_assoc for procedural style
        $products[] = $row;
    }
}
// Close the database connection
mysqli_close($conn); // Use mysqli_close for procedural style
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <?php if (empty($products)): ?>
                <p>No products found in this category.</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                        <img src="./images/cloths-category.jpg" class="card-img-top" ">

                            <div class="card-body"> 
                                <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text"><?= htmlspecialchars($product['description']); ?></p>
                                <p class="card-text"><strong>Price: </strong><?= htmlspecialchars(number_format($product['price'], 2)); ?></p>
                                <p class="card-text"><strong>Stock: </strong><?= htmlspecialchars($product['stock_quantity']); ?></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>