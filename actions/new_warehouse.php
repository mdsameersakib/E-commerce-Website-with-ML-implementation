<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $quantity = $_POST['quantity'];

    try {
        $sql = "INSERT INTO warehouse (address, postcode, qty) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$address, $postcode, $quantity]);

        if ($result) {
            http_response_code(200);
            echo "Warehouse added successfully";
        } else {
            http_response_code(500);
            echo "Error: Failed to add warehouse";
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error: " . $e->getMessage();
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
