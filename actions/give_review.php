<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id']; 
    $customer_id = $_POST['customer_id'];
    $review = $_POST['review'];
    
    try {
        $sql_insert_review = "INSERT INTO review (product_id, customer_id, user_review) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql_insert_review);
        $res = $stmt->execute([$product_id, $customer_id, $review]);
        if ($res) {
            echo "Review inserted successfully.";
        } else {
            echo "Error inserting review.";
        }
    } catch (PDOException $e) {
        echo "Error inserting review: " . $e->getMessage();
    }
}
?>
