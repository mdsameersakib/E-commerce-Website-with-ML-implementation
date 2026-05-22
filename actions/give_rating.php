<?php
include '../includes/dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id']; 
    $rating = (float)$_POST['rating'];
    
    try {
        // Query to fetch existing rating for the product
        $sql_fetch_rating = "SELECT rating FROM product WHERE product_id = ?";
        $stmt_fetch = $conn->prepare($sql_fetch_rating);
        $stmt_fetch->execute([$product_id]);
        $row = $stmt_fetch->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $existing_rating = (float)$row['rating'];
            $total_ratings = $existing_rating + $rating; // Increment total ratings
        
            // Calculate new average rating
            $new_average_rating = $total_ratings / 2.0;
        
            // Update rating in the database
            $sql_update_rating = "UPDATE product SET rating = ? WHERE product_id = ?";
            $stmt_update = $conn->prepare($sql_update_rating);
            $stmt_update->execute([$new_average_rating, $product_id]);
        }
    } catch (PDOException $e) {
        // Silently fail or log error
    }
}
?>