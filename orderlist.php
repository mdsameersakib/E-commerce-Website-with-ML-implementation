<?php

    // Include database connection file
    include 'dbconnect.php';
     // Exclude products with order_id assigned
    $customer_id = $_GET['customer'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
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
                <a href="menu.php?userid=<?php echo $customer_id; ?>">Menu</a>
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
            <div hidden id="cus">  <?php echo $customer_id ; ?></div>
            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <section>
        <?php
            $order_query = "SELECT DISTINCT order_id FROM adds WHERE customer_id = $customer_id AND order_id <> 0;";
            $order_result = mysqli_query($conn, $order_query);
            if (mysqli_num_rows($order_result) == 0) {
                // If no orders found, display message
                echo '<h1 class="titleUser">You Have No orders</h1>';
            } else {
                // Iterate through orders and display them
                while ($order_row = mysqli_fetch_assoc($order_result)) {
                    $order_id = $order_row['order_id'];
             ?>
            <div class="cart-container">
                <h1 class="cart_title">Order ID: <?php echo $order_row['order_id'] ?> </h1>
                <hr>
                <!-- loop 2 -->
                <div class="cart_header">
                    <div>Image</div>
                    <div>Product Name</div>
                    <div>Product ID</div>
                    <div>Price</div>
                    <div>Quantity</div>
                    <div>Action</div>
                </div>
                <?php 
                    $product_query = "SELECT a.*, p.* FROM adds AS a JOIN product AS p ON a.product_id = p.product_id WHERE a.order_id = $order_id";
                    $product_result = mysqli_query($conn,  $product_query);
                    if ($product_result) {
                        while ($product_row = mysqli_fetch_assoc($product_result)) {
                            $sql_ref = "SELECT * FROM refund WHERE product_id = '" . $product_row['product_id'] . "' AND order_id = '$order_id'";
                            $order_result_refund = mysqli_query($conn, $sql_ref);
                            $total_rows = mysqli_num_rows($order_result_refund);
                ?>
                    
                    <div class="cart_list">
                        
                        <div><img src="<?php echo $product_row['image']; ?>" /></div>
                        <div><?php echo $product_row['Pname']; ?></div>
                        <div><?php echo $product_row['product_id']; ?></div>
                        <div><?php echo $product_row['price']; ?></div>
                        <div><?php echo $product_row['quantity']; ?></div>





                        
                        <?php if ($total_rows == 0): ?>
                    <button class="button-5" onclick="redirectToRefund('<?php echo $product_row['Pname']; ?>', '<?php echo $product_row['product_id']; ?>', '<?php echo $order_row['order_id']; ?>')">Refund</button>
                <?php else: ?>
                    <button style="margin-left: 20px; width: 130px; padding: 10px;" type="button" class="button-5 stock-out" disabled>Refunded</button>
                <?php endif; ?>
                    </div>
                    <?php 
                        }
                    }                
                    ?>

                </div>
                <?php
                
                    }
                } 
            ?>
                                        
        </section>
    </section>
    <script>
    function redirectToRefund(x,y,z) {
            // Retrieve customer ID from the hidden element
    const customerId = document.getElementById("cus").innerText;

    // Redirect to orderlist.php with customer ID as a query parameter
    window.location.href = `Refund.php?customer=${customerId}&product_name=${x}&product_id=${y}&order_id=${z}`;

    }

    </script>
</body>


</html>

