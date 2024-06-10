<?php
    // Include database connection file
    include 'dbconnect.php';

    // Function to fetch user details by ID
    function fetchUserDetails($conn, $userid) {
        // Define your SQL query
        $sql_u = "SELECT * FROM customer where customer_id = $userid";
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
            $userid = $row['customer_id'];
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
                <a href="menu.php?userid=<?php echo $userid; ?>">Menu</a>
                <div class="dropdown">
                    <a href="">Categories</a>
                    <div class="dropdown-content">
                      <a href="category_electronics.php?userid=<?php echo $userid; ?>">Electronics</a>
                      <a href="category_accessories.php?userid=<?php echo $userid; ?>">Accessories</a>
                      <a href="category_clothes.php?userid=<?php echo $userid;?>">Clothes</a>
                      <a href="category_stationery.php?userid=<?php echo $userid; ?>">Stationery</a>
                      <a href="category_selfcare.php?userid=<?php echo $userid; ?>">Self Care</a>
                      <a href="category_healthcare.php?userid=<?php echo $userid; ?>">Health Care</a>
                      <a href="category_food.php?userid=<?php echo $userid; ?>">Food Items</a>
                      <a href="category_household.php?userid=<?php echo $userid; ?>">Household</a>
                    </div>
                  </div>
            </nav>

            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                
                <a href="profile.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">

        </div>

        <div class="gap"></div>
        <p></p>
        <h1 class="titleUser">Welcome,  <span class="Cusername"><?php echo $row['Cname'] ; ?></span></h1>
        <hr>
        <section class="categories">

            <h1 class="title">Categories</h1>
            <div>
                <div class="category_section">
                    <a href="category_electronics.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-plug"></i>
                            <p>Electronics</p>
                        </div>
                    </a>
                    <a href="category_accessories.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-gem"></i>
                            <p>Accessories</p>
                        </div>
                    </a>
                    <a href="category_clothes.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-shirt"></i>
                            <p>Clothes</p>
                        </div>
                    </a>
                    <a href="category_stationery.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-book-open"></i>
                            <p>Stationary</p>
                        </div>
                    </a>

                </div>
                <div class="category_section">
                    <a href="category_selfcare.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-mask"></i>
                            <p>Self Care</p>
                        </div>
                    </a>
                    <a href="category_healthcare.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-kit-medical"></i>
                            <p>Health Care</p>
                        </div>
                    </a>
                    <a href="category_food.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-utensils"></i>
                            <p>Food Items</p>
                        </div>
                    </a>
                    <a href="category_household.php?userid=<?php echo $userid; ?>">
                        <div>
                            <i class="fa-solid fa-kitchen-set"></i>
                            <p>Household</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <hr>
    </section>
    
</body>

</html>


