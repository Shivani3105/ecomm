<?php
    require 'dbconfig.php'; // Include the database connection

    // Prepare the SQL statement
    $sql = "SELECT * FROM product WHERE category='Electronics'";
    $result = $conn->query($sql);

    $products = [];

    if ($result->num_rows > 0) {
        // Fetch all products
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    
    // Return the product data as JSON
    header('Content-Type: application/json');
    echo json_encode($products);

    // Close the database connection
    $conn->close();
?>