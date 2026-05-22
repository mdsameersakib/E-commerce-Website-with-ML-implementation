<?php
// Include database connection file
include '../includes/dbconnect.php';

// Check if product ID and quantity are set
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    try {
        // Start a transaction
        $conn->beginTransaction();

        // Fetch the current stock of the product
        $sql_get_stock = "SELECT stock FROM product WHERE product_id = ? FOR UPDATE";
        $stmt_get_stock = $conn->prepare($sql_get_stock);
        $stmt_get_stock->execute([$productId]);
        $row = $stmt_get_stock->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $currentStock = $row['stock'];

            // Check if there is enough stock to update
            if ($currentStock >= $newQuantity) {
                // Calculate the new stock after subtracting the quantity
                $newStock = $currentStock - $newQuantity;

                // Update the stock in the database
                $sql_update_stock = "UPDATE product SET stock = ? WHERE product_id = ?";
                $stmt_update_stock = $conn->prepare($sql_update_stock);
                $stmt_update_stock->execute([$newStock, $productId]);

                // Commit the transaction
                $conn->commit();
                echo 'success';
            } else {
                // Rollback the transaction
                $conn->rollBack();
                echo 'insufficient_stock';
            }
        } else {
            // Rollback the transaction
            $conn->rollBack();
            echo 'error_fetching_stock';
        }
    } catch (PDOException $e) {
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        echo 'error';
    }
} else {
    // Invalid request
    echo 'invalid';
}
?>
