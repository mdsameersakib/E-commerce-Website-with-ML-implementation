<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    try {
        $sql = "DELETE FROM wishlist WHERE product_id = ? AND customer_id = ?";
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