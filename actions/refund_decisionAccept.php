<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $order_id = $_POST['order_id'];

    try {
        $sql = "UPDATE refund SET status = 'Refunded' WHERE order_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$order_id, $product_id]);
    } catch (PDOException $e) {
        // Handle error
    }
}
?>