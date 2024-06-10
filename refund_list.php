<?php

    // Include database connection file
    include 'dbconnect.php';
    $customer_id = $_GET['customer'];
    // Define your SQL query
    $sql_u = "SELECT DISTINCT
    refund.*,
    product.Pname,
    orders.total_price,
    adds.quantity
FROM 
    refund
INNER JOIN 
    product ON refund.product_id = product.product_id
INNER JOIN 
    orders ON refund.order_id = orders.order_id
INNER JOIN 
    adds ON refund.product_id = adds.product_id
WHERE 
    refund.customer_id = '$customer_id'
    GROUP BY product.product_id;
    "; 
    // Execute the query
    $res_u = mysqli_query($conn, $sql_u);
    ?>
</body>
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
                <a href="menu.php?userid=<?php echo  $customer_id; ?>">Menu</a>
                <div class="dropdown">
                    <a href="">Categories</a>
                    <div class="dropdown-content">
                      <a href="category_electronics.php?userid=<?php echo  $customer_id; ?>">Electronics</a>
                      <a href="category_accessories.php?userid=<?php echo  $customer_id; ?>">Accessories</a>
                      <a href="category_clothes.php?userid=<?php echo  $customer_id; ?>">Clothes</a>
                      <a href="category_stationery.php?userid=<?php echo  $customer_id; ?>">Stationery</a>
                      <a href="category_selfcare.php?userid=<?php echo  $customer_id; ?>">Self Care</a>
                      <a href="category_healthcare.php?userid=<?php echo  $customer_id; ?>">Health Care</a>
                      <a href="category_food.php?userid=<?php echo  $customer_id; ?>">Food Items</a>
                      <a href="category_household.php?userid=<?php echo  $customer_id; ?>">Household</a>
                    </div>
                  </div>
            </nav>

            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>

        <section>
            <!-- loop -->
            <?php
                if ($res_u) {
                    // Fetch and display all images
                    while ($row = mysqli_fetch_assoc($res_u)) {
                        $order_id=$row['order_id'];
                        $product_id = $row['product_id'];
                        $product_name=$row['Pname'];
                        $imageData = $row['img'];
                        $quantity= $row['quantity'];
                        // Generate data URI for the image
                        $total=$row['total_price'];
                        $imageDataURI = 'data:image/jpeg;base64,' . base64_encode($imageData);
                        $reason=$row['reason'];
                        $status=$row['status'];
            ?>
            <div>
                <div class="cart-container refund_slot" style="display: flex; justify-content: space-between; ">
                <div style="width: 20%;">
                <h3>&nbsp;&nbsp;&nbsp;&nbsp;Uploaded Image</h3>
                <img style="width: 200px;" src="<?php echo $imageDataURI; ?>" alt="Uploaded Image" />
            </div>
                    <div style=" width: 80%; margin-top: 60px;">
                        <div style="display: flex;" class="refund_slot">
                            <p><b>Order Id:</b><?php echo $order_id; ?> </p>
                            <p><b>Product Name : </b><?php echo $product_name; ?></p>
                            <p><b>Quantity : </b> <?php echo $quantity; ?></p>
                            <p><b>Total Price :</b> <?php echo $total; ?></p>
                            <p><b>Refund Status : </b><?php echo $status; ?></p>
                        </div>
                        <div class="refund_slot">
                            <h3>Reason for refunding</h3>
                            <p> <?php echo $reason; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop end -->
                <?php
                        }
                    } 

                ?>
        </section>


    </section>
</body>

</html>