<?php
    // Include database connection file
    include 'includes/dbconnect.php';
    $userid = $_GET['userid'] ?? '';

    // Prepare and execute using PDO
    $stmt = $conn->prepare("SELECT * FROM employee WHERE employee_id = ?");
    $stmt->execute([$userid]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        $row = ['Ename' => 'Guest'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Welcome to our Shopping Website</h1>
        <h1>welcome user <?php echo $row['Ename']; ?> </h1>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Explore our Products</h2>
        <!-- Product categories, product listings, etc. can be added here -->
    </main>
    <footer>
        <p>&copy; 2024 Your Shopping Website. All rights reserved.</p>

    </footer>
</body>

</html>