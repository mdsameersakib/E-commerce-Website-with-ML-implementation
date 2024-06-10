<?php
include 'dbconnect.php'; // Assuming this includes your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the POST request
    $product_id = $_POST['product_id']; 
    $customer_id = $_POST['customer_id'];
    $review = $_POST['review'];
    
    // Prepare the SQL insert statement
    $sql_insert_review = "INSERT INTO review (product_id, customer_id, user_review) VALUES ('$product_id', '$customer_id', '$review')";
    
    // Execute the SQL insert statement
    if (mysqli_query($conn, $sql_insert_review)) {
        echo "Review inserted successfully.";
    } else {
        echo "Error inserting review: " . mysqli_error($conn);
    }
}
?>
