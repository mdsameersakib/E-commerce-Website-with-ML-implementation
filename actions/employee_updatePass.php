<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_pass = $_POST['new_password'] ?? '';
    $employee_id = $_POST['employee_id'] ?? '';

    if (empty($new_pass) || empty($employee_id)) {
        echo "Error: Missing required parameters.";
        exit();
    }

    // Secure password hashing
    $hashed_password = password_hash($new_pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE employee SET password = ? WHERE employee_id = ?");
    $res = $stmt->execute([$hashed_password, $employee_id]);
    
    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error updating password";
    }
}
?>