<?php
// Include database connection file
include 'dbconnect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $brand_name = $_POST["brand_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $employee_id = $_POST["employee_id"];

    // Insert data into the supplier table
    $sql = "INSERT INTO supplier (employee_id, brand_name, phone_number, email_address, address) 
            VALUES ('$employee_id', '$brand_name', '$phone', '$email', '$address')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>
