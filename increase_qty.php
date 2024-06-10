<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qty = $_POST['qty'];
    $warehouse_id = $_POST['warehouse_id'];

    // Increment the quantity in the warehouse table
    $sql = "UPDATE warehouse SET qty = qty + $qty WHERE warehouse_id = $warehouse_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
}
?>
