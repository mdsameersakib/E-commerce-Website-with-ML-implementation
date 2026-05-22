<?php
include '../includes/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST["brand_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $employee_id = $_POST["employee_id"];

    try {
        $sql = "INSERT INTO supplier (employee_id, brand_name, phone_number, email_address, address) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$employee_id, $brand_name, $phone, $email, $address]);

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
