<?php
// Include database connection file
include 'dbconnect.php';

// Initialize $res_u variable
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product_id from the form
    $new_pass = $_POST['new_password']; // Change $_GET to $_POST
    
    // Check if customer_id is received via query parameter
    $customer_id = $_POST['customer_id']; // Change $_GET to $_POST
    echo $customer_id;
    // Debugging: Check if product_id and customer_id are received
    // print_r($product_id);
    // print_r($customer_id);

    // Insert data into the adds table
    $sql = "UPDATE customer SET password = '$new_pass' WHERE customer_id = '$customer_id'";
    $res = mysqli_query($conn, $sql); // Added semicolon at the end of the line
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>