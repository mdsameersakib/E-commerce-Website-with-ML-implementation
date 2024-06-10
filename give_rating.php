<?php
include 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = $_POST['product_id']; 
    $rating = $_POST['rating'];
    
    // Query to fetch existing rating for the product
    $sql_fetch_rating = "SELECT rating FROM product WHERE product_id = '$product_id'";
    $result_fetch_rating = mysqli_query($conn, $sql_fetch_rating);
    
    if ($result_fetch_rating) {
        $row = mysqli_fetch_assoc($result_fetch_rating);
        $existing_rating = $row['rating'];
        $total_ratings = $existing_rating + $rating; // Increment total ratings
    
        // Calculate new average rating
        $new_average_rating = $total_ratings / 2;
    
        // Update rating in the database
        $sql_update_rating = "UPDATE product SET rating = '$new_average_rating' WHERE product_id = '$product_id'";
        $result_update_rating = mysqli_query($conn, $sql_update_rating);
    
    }
}
?>