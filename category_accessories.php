<?php
    // Include database connection file
    include 'dbconnect.php';
    // Define your SQL query
    $sql_u = "SELECT * FROM product where category='accessories' ";
    $sql_p = "SELECT * FROM customer where customer_id=" .$_GET['userid'];
    // Execute the query
    $res_u = mysqli_query($conn, $sql_u);
    $res_p = mysqli_query($conn, $sql_p);
    $row_u = mysqli_fetch_assoc($res_u);
    $row_p=mysqli_fetch_assoc($res_p);
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
                <a href="menu.php?userid=<?php echo $row_p['customer_id']; ?>">Menu</a>
                <div class="dropdown">
                    <a href="">Categories</a>
                    <div class="dropdown-content">
                      <a href="category_electronics.php?userid=<?php echo $row_p['customer_id']; ?>">Electronics</a>
                      <a href="category_accessories.php?userid=<?php echo $row_p['customer_id']; ?>">Accessories</a>
                      <a href="category_clothes.php?userid=<?php echo $row_p['customer_id']; ?>">Clothes</a>
                      <a href="category_stationery.php?userid=<?php echo $row_p['customer_id']; ?>">Stationery</a>
                      <a href="category_selfcare.php?userid=<?php echo $row_p['customer_id']; ?>">Self Care</a>
                      <a href="category_healthcare.php?userid=<?php echo $row_p['customer_id']; ?>">Health Care</a>
                      <a href="category_food.php?userid=<?php echo $row_p['customer_id']; ?>">Food Items</a>
                      <a href="category_household.php?userid=<?php echo $row_p['customer_id']; ?>">Household</a>
                    </div>
                  </div>
            </nav>

            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $row_p['customer_id']; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $row_p['customer_id']; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $row_p['customer_id']; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">

        </div>

        <div hidden id="cus">  <?php echo $row_p['customer_id'] ; ?></div>
        <div class="gap"></div>
        <section>
            <h1 class="title2">Accessories</h1>
            <div class="container">
                <?php
                    while($row = mysqli_fetch_assoc($res_u)){
                        
                ?>
                <div class="card">
                    <div class="image">
                        <a href="product_page.php?customer=<?php echo $row_p['customer_id']; ?>&product=<?php echo $row['product_id']; ?>">
                        <?php $imageData = $row['image'];
                        echo '<img src="' . $imageData . '" alt=""><br>'; ?>
                        </a>
                    </div>
                    <div class="caption">
                        <p class="rate">
                        <div class="card_info">
                            <div><span><?php echo $row['rating'];  ?> </span><i class="fas fa-star"></i></div>
                            <div><button class="wishlist_btn"><i class="fas fa-heart" onclick="addTowishlist(<?php echo $row['product_id']; ?>, <?php echo $row_p['customer_id']; ?>); this.style.color = 'red';"></i>
                                    <span class="tooltiptext">Add to wishlist</span>
                                </button></div>
                        </div>
                        </p>
                        <?php 
                         $product_id = $row['product_id'];
                         $discount_query = "SELECT * FROM discount WHERE product_id = $product_id";
                         $discount_result = mysqli_query($conn, $discount_query);
                         if (mysqli_num_rows($discount_result) > 0) {
                            $discount_row = mysqli_fetch_assoc($discount_result);
                            $discount_value = $discount_row['percentage'];
                            $new_price = $row['price'] -($row['price']*($discount_value/100));               
                        
                        ?>
                        <p class="product_name"><?php echo $row['Pname'];  ?> <span style="margin-left:10px; color:red;"><b><?php echo $discount_value; ?>%Off</b></span></p>

                        <p class="price"><del><b><?php echo $row['price']; ?></b>TK</del> <span style="color: red;"><?php echo $new_price; ?>TK</span></p>
                        <?php 
                         } else{
                            $new_price=$row['price'];
                        ?>
                        <p class="product_name"><?php echo $row['Pname'];  ?></p>

                        <p class="price"><b>৳<?php echo $new_price; ?>TK</b></p>
                        <?php
                         }
                        ?>
                        

                    </div>
                    <form id="addToCartForm" method="get">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $row_p['customer_id']; ?>">
                        <?php if ($row['stock'] == 0): ?>
                            <button type="button" class="button-5 stock-out" disabled>Stock Out</button>
                        <?php else: ?>
                            <button type="button" class="button-5" onclick="addToCart(<?php echo $row['product_id']; ?>, <?php echo $row_p['customer_id']; ?>)">Add to cart</button>
                        <?php endif; ?>

                    </form>

                </div>
                <?php

                }
                ?>
            </div>



        </section>
        
        
    </section>
    <!-- index.php -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function addToCart(x, y) {
            console.log(y);
            const varia = document.getElementById("cus");
            let cid = varia.innerText;
            fetch('addtocart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + x + '&customer_id=' + cid, // Added '&' to separate parameters
            }).then(response => {
                if (response.ok) {
                    // If successful, display success notification
                    showNotification('Item added to cart successfully', 'success');
                } else {
                    // If failed, display error notification
                    showNotification('Failed to add item to cart', 'error');
                }
            }).catch(error => {
                // If error occurs, display error notification
                showNotification('Error: ' + error, 'error');
            });
        }

        function addTowishlist(x, y) {
            const varia = document.getElementById("cus");
            let cid = varia.innerText;

            fetch('addtowishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + x + '&customer_id=' + cid,
            }).then(response => {
                if (response.ok) {
                    // If successful, display success notification
                    showNotification('Item added to wishlist successfully', 'success');
                } else {
                    // If failed, display error notification
                    showNotification('Failed to add item to wishlist', 'error');
                }
            }).catch(error => {
                // If error occurs, display error notification
                showNotification('Error: ' + error, 'error');
            });
        }

        function showNotification(message, type, success) {
            // Remove any existing notification
            const existingNotification = document.querySelector('.notification.visible');
            if (existingNotification) {
                existingNotification.remove();
            }

            // Create new notification
            const notification = document.createElement('div');
            notification.classList.add('notification', type);
            notification.textContent = message;

            // Append the notification to the body
            document.body.appendChild(notification);

            // Trigger reflow to apply transition
            void notification.offsetWidth;

            // Add visible class to start fade in transition
            notification.classList.add('visible');

            // Remove the notification after 3 seconds
            setTimeout(() => {
                // Start fade out transition
                notification.classList.remove('visible');
                // Remove the notification from the DOM after transition ends
                setTimeout(() => {
                    notification.remove();
                }, 500); // Transition duration
            }, 1000); // Notification duration
        }
    </script>
</body>
</html>
