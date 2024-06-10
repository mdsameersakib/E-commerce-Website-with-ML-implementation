<?php
// Include database connection file
include 'dbconnect.php';

// Check if the form data is received via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $quantity = $_POST['quantity'];

    // Prepare and execute SQL query to insert data into the warehouse table
    $sql = "INSERT INTO warehouse (address, postcode, qty) VALUES ('$address', '$postcode', '$quantity')";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Send a success response
        http_response_code(200);
        echo "Warehouse added successfully";
    } else {
        // Send an error response
        http_response_code(500);
        echo "Error: Failed to add warehouse";
    }
} else {
    // If the request method is not POST, send a method not allowed response
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
