<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_address = $_POST['new_address'];
    $customer_id = $_POST['customer_id'];
    try {
        $sql = "UPDATE customer SET address = ? WHERE customer_id = ?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$new_address, $customer_id]);
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