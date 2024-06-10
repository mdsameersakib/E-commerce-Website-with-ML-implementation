<?php
// Include database connection file
include 'dbconnect.php';

// Initialize $res_u variable
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product_id from the form
    $product_id = $_POST['product_id']; // Change $_GET to $_POST
    
    // Check if customer_id is received via query parameter
    $order_id = $_POST['order_id']; // Change $_GET to $_POST
    echo $customer_id;
    // Debugging: Check if product_id and customer_id are received
    // print_r($product_id);
    // print_r($customer_id);

    // Insert data into the adds table
    $sql = "UPDATE refund SET status = 'On Hold' WHERE order_id = '$order_id' AND product_id='$product_id'";
    $res = mysqli_query($conn, $sql); // Added semicolon at the end of the line
}
?>