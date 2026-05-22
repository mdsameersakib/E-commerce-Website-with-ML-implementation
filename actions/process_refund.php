<?php
// Include database connection file
include '../includes/dbconnect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve other form data
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $reason = $_POST['reason'];
    $order_id = $_POST['order_id'];
    $status = "Proccessing";

    // Validate that image file is present
    if (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
        die("Error: Image upload failed or no image uploaded.");
    }

    $image = $_FILES['img'];

    // Validate size limit (2MB)
    $max_size = 2 * 1024 * 1024;
    if ($image['size'] > $max_size) {
        die("Error: Maximum file size is 2MB.");
    }

    // Validate MIME type via finfo
    $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($image['tmp_name']);

    if (!in_array($mime, $allowed_types)) {
        die("Error: Only JPG, PNG, and WEBP image formats are allowed.");
    }

    // Get file extension safely
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp'])) {
        die("Error: Invalid file extension.");
    }

    // Generate unique UUID name
    $uuid = bin2hex(random_bytes(16));
    $filename = $uuid . '.' . strtolower($ext);

    // Ensure uploads directory exists
    $dest_dir = __DIR__ . "/../uploads/";
    if (!is_dir($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }

    $dest_file = $dest_dir . $filename;

    if (!move_uploaded_file($image['tmp_name'], $dest_file)) {
        die("Error: Failed to save uploaded image.");
    }

    try {
        // Insert data into the refund table, storing filename
        $query = "INSERT INTO refund (order_id, product_id, customer_id, reason, img, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$order_id, $product_id, $customer_id, $reason, $filename, $status]);

        if ($stmt->rowCount() > 0) {
            echo "Refund request submitted successfully.";
        } else {
            echo "Error submitting refund request.";
        }
    } catch (PDOException $e) {
        // Cleanup file if DB insert fails
        if (file_exists($dest_file)) {
            unlink($dest_file);
        }
        echo "Database error: " . $e->getMessage();
    }
}
?>
