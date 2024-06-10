<?php
    // Include database connection file
    include 'dbconnect.php';

    // Function to fetch user details by ID
    function fetchUserDetails($conn, $userid) {
        // Define your SQL query
        $sql_u = "SELECT * FROM employee where employee_id = $userid";
        // Execute the query
        $res_u = mysqli_query($conn, $sql_u);
        // Fetch the row
        $row = mysqli_fetch_assoc($res_u);
        // Check if a row is fetched
        if($row) {
            return $row;
        } else {
            return false;
        }
    }

    // Check if userid is set in the URL
    if(isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        // Fetch user details
        $row = fetchUserDetails($conn, $userid);
        // Check if user details are fetched
        if($row) {
            // Assign userid
            $userid = $row['employee_id'];
        } else {
            // Handle case where no user details are fetched
            // For example, redirect to an error page
            header("Location: error.php");
            exit();
        }
    } else {
        // Handle case where userid is not set in the URL
        // For example, redirect to an error page
        header("Location: error.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu page</title>
    <link rel="stylesheet" href="menustyle.css">
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <section class="body">
        <header class="header">
            <div class="logo">
                <span class="logotext"><i class="fa-solid fa-holly-berry"></i></span>
            </div>

            <div class="menu_icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <nav class="navbar">
                <a href="employee_menu.php?userid=<?php echo $userid; ?>">Menu</a>
            </nav>
            <div class="nav_icon">                
                <a href="employee_profile.php?employee=<?php echo $userid;?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">
        </div>
        <p></p>
        <div class="gap"></div>
        <h1 class="titleUser">Welcome  <span class="Cusername"><?php echo $row['Ename'] ; ?></span></h1>
        <hr>
        <h1 class="title">Categories</h1>
        <div>
                <div class="category_section">
                    <a href="employee_warehouse.php?employee=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-warehouse"></i>
                            <p>Warehouse</p>
                        </div>
                    </a>
                    <a href="employee_supplier.php?employee=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <p>Supplier</p>
                        </div>
                    </a>
                    <a href="employee_refund.php?employee=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-clipboard"></i>
                            <p>Refund Requests</p>
                        </div>
                    </a>

                </div>
            </div>
    </section>
</body>
