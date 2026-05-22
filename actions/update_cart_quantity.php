<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'] ?? '';
    $customer_id = $_POST['customer_id'] ?? '';
    $quantity = intval($_POST['quantity'] ?? 1);

    if (!empty($product_id) && !empty($customer_id) && $quantity > 0) {
        try {
            $stmt = $conn->prepare("UPDATE adds SET quantity = ? WHERE customer_id = ? AND product_id = ? AND order_id = '0'");
            $stmt->execute([$quantity, $customer_id, $product_id]);
            echo "success";
        } catch (PDOException $e) {
            http_response_code(500);
            echo "Database error: " . $e->getMessage();
        }
    } else {
        http_response_code(400);
        echo "Invalid parameters";
    }
}
?>
