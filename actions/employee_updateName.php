<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['new_name'];
    $employee_id = $_POST['employee_id'];
    try {
        $sql = "UPDATE employee SET Ename = ? WHERE employee_id = ?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$new_name, $employee_id]);
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