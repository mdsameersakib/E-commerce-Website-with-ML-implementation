<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_pass = $_POST['new_password'] ?? '';
    $customer_id = $_POST['customer_id'] ?? '';

    if (empty($new_pass) || empty($customer_id)) {
        echo "Error: Missing required parameters.";
        exit();
    }

    // Secure password hashing
    $hashed_password = password_hash($new_pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE customer SET password = ? WHERE customer_id = ?");
    $res = $stmt->execute([$hashed_password, $customer_id]);
    
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error updating password";
    }
}
?>