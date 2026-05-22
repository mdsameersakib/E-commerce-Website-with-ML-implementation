<?php
include '../includes/dbconnect.php';

$userid = $_POST['userid'] ?? '';
$password_cus = $_POST['password'] ?? '';

if (empty($userid) || empty($password_cus)) {
    $name_error = "Please provide both Username and Password";
    header("Location: ../login.php?name_error=" . urlencode($name_error));
    exit();
}

$len = strlen($userid);

if ($len == 5) {
    // Customer login
    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id = ?");
    $stmt->execute([$userid]);
    $row = $stmt->fetch();
    
    if ($row) {
        // Verify hashed password
        if (password_verify($password_cus, $row['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['userid'] = $userid;
            $_SESSION['role'] = 'customer';
            header("Location: ../menu.php?userid=" . urlencode($userid));
            exit();
        } else {
            $name_error = "Password Invalid";
            header("Location: ../login.php?name_error=" . urlencode($name_error));
            exit();
        }
    } else {
        $name_error = "UserID Invalid";
        header("Location: ../login.php?name_error=" . urlencode($name_error));
        exit();
    }
} else {
    // Employee login
    $stmt = $conn->prepare("SELECT * FROM employee WHERE employee_id = ?");
    $stmt->execute([$userid]);
    $row = $stmt->fetch();
    
    if ($row) {
        // Verify hashed password
        if (password_verify($password_cus, $row['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['userid'] = $userid;
            $_SESSION['role'] = 'employee';
            header("Location: ../employee/employee_menu.php?userid=" . urlencode($userid));
            exit();
        } else {
            $name_error = "Password Invalid";
            header("Location: ../login.php?name_error=" . urlencode($name_error));
            exit();
        }
    } else {
        $name_error = "UserID Invalid";
        header("Location: ../login.php?name_error=" . urlencode($name_error));
        exit();
    }   
}
?>
