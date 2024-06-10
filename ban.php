<?php
// Include database connection file
include 'dbconnect.php';

// Initialize $res_u variable
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id']; // Change $_GET to $_POST
    $sql = "DELETE FROM customer WHERE customer_id = '$customer_id'";
    $res = mysqli_query($conn, $sql); // Added semicolon at the end of the line
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>