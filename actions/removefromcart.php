<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    try {
        $sql = "DELETE FROM adds WHERE customer_id = ? AND order_id = '0'";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$customer_id]);
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