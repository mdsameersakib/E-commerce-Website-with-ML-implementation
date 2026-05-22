<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract individual data fields from the form data
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $address = $_POST['address'] ?? '';
    $type = $_POST['type'] ?? '';

    if (empty($username) || empty($email) || empty($password)) {
        echo "Error: Username, Email, and Password are required.";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO employee (Ename, password, phone, email, address, type) VALUES (?, ?, ?, ?, ?, ?)");
    try {
        $res = $stmt->execute([$username, $hashed_password, $phoneNumber, $email, $address, $type]);
        if ($res) {
            echo "New record created successfully";
        } else {
            echo "Error creating record";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
