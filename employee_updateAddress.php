<?php
// Include database connection file
include 'dbconnect.php';

// Initialize $res_u variable
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product_id from the form
    $new_address = $_POST['new_address']; // Change $_GET to $_POST
    
    // Check if customer_id is received via query parameter
    $employee_id = $_POST['employee_id']; // Change $_GET to $_POST
    // Debugging: Check if product_id and customer_id are received
    // print_r($product_id);
    // print_r($customer_id);

    // Insert data into the adds table
    $sql = "UPDATE employee SET address = '$new_address' WHERE employee_id = ' $employee_id'";
    $res = mysqli_query($conn, $sql); // Added semicolon at the end of the line
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>