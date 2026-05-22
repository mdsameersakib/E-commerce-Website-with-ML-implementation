<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_address = $_POST['new_address'];
    $employee_id = trim($_POST['employee_id']);
    try {
        $sql = "UPDATE employee SET address = ? WHERE employee_id = ?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$new_address, $employee_id]);
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