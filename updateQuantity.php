<?php
// Include database connection file
include 'dbconnect.php';

// Check if product ID and quantity are set
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Start a transaction
    mysqli_begin_transaction($conn);

    // Fetch the current stock of the product
    $sql_get_stock = "SELECT stock FROM product WHERE product_id = $productId FOR UPDATE";
    $result_get_stock = mysqli_query($conn, $sql_get_stock);

    if ($result_get_stock && mysqli_num_rows($result_get_stock) > 0) {
        $row = mysqli_fetch_assoc($result_get_stock);
        $currentStock = $row['stock'];

        // Check if there is enough stock to update
        if ($currentStock >= $newQuantity) {
            // Calculate the new stock after subtracting the quantity
            $newStock = $currentStock - $newQuantity;

            // Update the stock in the database
            $sql_update_stock = "UPDATE product SET stock = $newStock WHERE product_id = $productId";
            if (mysqli_query($conn, $sql_update_stock)) {
                // Commit the transaction
                mysqli_commit($conn);
                // Quantity updated successfully
                echo 'success';
            } else {
                // Rollback the transaction
                mysqli_rollback($conn);
                // Failed to update quantity
                echo 'error';
            }
        } else {
            // Rollback the transaction
            mysqli_rollback($conn);
            // Insufficient stock
            echo 'insufficient_stock';
        }
    } else {
        // Rollback the transaction
        mysqli_rollback($conn);
        // Failed to fetch stock
        echo 'error_fetching_stock';
    }
} else {
    // Invalid request
    echo 'invalid';
}
?>
