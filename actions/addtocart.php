<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];

    try {
        // Insert with explicit order_id = 0 and quantity = 1 to support strict DB modes
        $sql = "INSERT INTO adds (product_id, customer_id, order_id, quantity) VALUES (?, ?, 0, 1)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$product_id, $customer_id]);
        if ($res) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data";
        }
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
}
?>