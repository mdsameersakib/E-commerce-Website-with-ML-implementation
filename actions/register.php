<?php
include '../includes/dbconnect.php';

$username = $_POST['username'] ?? '';
$password_cus = $_POST['password'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';

if (empty($username) || empty($password_cus) || empty($phone) || empty($email) || empty($address)) {
    $name_error = "Please give all credentials";
    header("Location: ../reg_form.php?name_error=" . urlencode($name_error));
    exit();
}

// Checking if username or email is already in database
$stmt_u = $conn->prepare("SELECT customer_id FROM customer WHERE cname = ?");
$stmt_u->execute([$username]);
$exists_username = $stmt_u->fetch();

$stmt_e = $conn->prepare("SELECT customer_id FROM customer WHERE email = ?");
$stmt_e->execute([$email]);
$exists_email = $stmt_e->fetch();

if ($exists_username) {
    $name_error = "Sorry... Username already taken";
    header("Location: ../reg_form.php?name_error=" . urlencode($name_error));
    exit();
} else if ($exists_email) {
    $name_error = "Sorry... Email already taken";
    header("Location: ../reg_form.php?name_error=" . urlencode($name_error));
    exit();
} else {
    // Hashing password using bcrypt
    $hashed_password = password_hash($password_cus, PASSWORD_BCRYPT);
    
    // Inserting data in database
    $stmt = $conn->prepare("INSERT INTO customer (cname, password, phone, email, address) VALUES (?, ?, ?, ?, ?)");
    $result1 = $stmt->execute([$username, $hashed_password, $phone, $email, $address]);
    
    if ($result1) {
        // Get the auto-generated customer_id
        $customer_id = $conn->lastInsertId();
        $success = "Account Created!! Your ID is " . str_pad($customer_id, 5, '0', STR_PAD_LEFT);
    } else {
        $success = "Error creating account";
    }

    header("Location: ../reg_form.php?success=" . urlencode($success));
    exit();
}
?>
