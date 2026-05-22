<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qty = (int)$_POST['qty'];
    $warehouse_id = (int)$_POST['warehouse_id'];

    try {
        $sql = "UPDATE warehouse SET qty = qty + ? WHERE warehouse_id = ?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$qty, $warehouse_id]);

        if ($res) {
            echo "Quantity updated successfully";
        } else {
            echo "Error updating quantity";
        }
    } catch (PDOException $e) {
        echo "Error updating quantity: " . $e->getMessage();
    }
}
?>
