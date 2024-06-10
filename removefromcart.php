<?php
// Include database connection file
include 'dbconnect.php';

// Initialize $res_u variable
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if customer_id is received via query parameter
    $customer_id = $_POST['customer_id']; // Change $_GET to $_POST
    $sql = "DELETE FROM adds WHERE customer_id = '$customer_id' AND order_id='0'";
    $res = mysqli_query($conn, $sql); // Added semicolon at the end of the line
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>