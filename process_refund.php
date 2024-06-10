<?php
    // Include database connection file
    include 'dbconnect.php';
    
    // Retrieve other form data
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $reason = $_POST['reason'];
    $order_id= $_POST['order_id'];

    // Retrieve and handle the uploaded image
    $image = $_FILES['img'];
    $imageData = file_get_contents($image['tmp_name']); // Read the image data
    $imageType = $image['type']; // Get the image MIME type
    $status="Proccessing";

    // Insert data into the refund table, including the image as a longblob
    $query = "INSERT INTO refund (order_id, product_id, customer_id, reason, img , status ) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiisss",$order_id, $product_id, $customer_id, $reason, $imageData,  $status);

    // Attempt to reconnect to the database right before the query execution
    if (!$conn->ping()) {
        $conn->close();
        include 'dbconnect.php'; // Reconnect
    }

    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        echo "Refund request submitted successfully.";
    } else {
        echo "Error submitting refund request.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
?>
