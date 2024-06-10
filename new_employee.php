<?php
// Check if the request method is POST.
include 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract individual data fields from the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $sql = "INSERT INTO employee (Ename, password, phone, email, address, type) VALUES ('$username', '$password', '$phoneNumber', '$email', '$address', '$type')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
