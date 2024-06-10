<?php
    // Include database connection file
    include 'dbconnect.php';
     // Exclude products with order_id assigned
    $customer_id = $_GET['customer'];
    $product_id= $_GET['product'];
    $sql_p = "SELECT * FROM product where product_id='$product_id' ";
    $sql_c = "SELECT * FROM customer where customer_id='$customer_id'";
    
    $res_p = mysqli_query($conn, $sql_p);
    $res_c = mysqli_query($conn, $sql_c);
    $row_p=mysqli_fetch_assoc($res_p);
    // Get the product name
    $pname = $row_p['Pname']; // Example product name

    // Define the path to the file
    $filename = "X:/xamp/htdocs/product_name.txt";
    
    // Write the product name to the file
    file_put_contents($filename, $pname);
    
    // Execute Python script
    exec("python db_test.py");
    $imageData = $row_p['image'];
    $sql_r = "SELECT review.user_review, customer.Cname
          FROM review
          JOIN customer ON review.customer_id = customer.customer_id
          WHERE review.product_id = '$product_id'";

    $res_r=mysqli_query($conn, $sql_r);
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
            <div hidden id="cus">  <?php echo $customer_id; ?></div>
            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="gap"></div>
        <div class="product_page_1">
            <div><img src="<?php echo $imageData ?>" alt="Smartwatch.jpeg" /></div>
            <div class="product_page_1_2">
            <?php
                // Define the path to the Python script
                $result_filename = "X:/xamp/htdocs/result_array.txt";
                $result_array = file($result_filename, FILE_IGNORE_NEW_LINES);
                $query = "SELECT * FROM product WHERE Pname IN (";
                foreach ($result_array as $productName) {
                    $query .= "'" . $conn->real_escape_string($productName) . "',";
                }
                $query = rtrim($query, ','); // Remove the trailing comma
                $query .= ");";

                // Execute the query
                $result = $conn->query($query);
                                ?>
                <p><b>Name:</b> <?php echo  $row_p['Pname']; ?></p>
                <p><b>Price:</b> <?php echo  $row_p['price']; ?> TK</p>
                <p><b>Category:</b> <?php echo  $row_p['category']; ?></p>
                <p><b>Rating:</b>
                    <?php 
                    $rating = $row_p['rating'];
                    for ($i = 0; $i < $rating; $i++) {
                        echo '<i class="fa-solid fa-star"></i>';
                    }
                    ?>
                </p>
                <div hidden id="prod">  <?php echo $product_id; ?></div>
                <p><b>Description:</b> <?php echo  $row_p['review']; ?> </p>
                <?php if ($row_p['stock'] == 0): ?>
                            <button style="margin-left:20px;" type="button" class="button-5 stock-out" disabled>Stock Out</button>
                        <?php else: ?>
                            <button style="margin-left:20px;" type="button" class="button-5" onclick="addToCart(<?php echo $row_p['product_id']; ?>, <?php echo $customer_id; ?>)">Add to cart</button>
                        <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="product_page_2">
            <div>
            <p style="font-size: 24px; ">Rate this product: &nbsp&nbsp&nbsp&nbsp&nbsp<span class="star-rating">
                        <label for="rate-1" style="--i:1"><i  onclick="give_rating(1)"
                                class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-1" value="1"checked>
                        <label for="rate-2" style="--i:2"><i onclick="give_rating(2)"
                                class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-2" value="2" >
                        <label for="rate-3" style="--i:3"><i onclick="give_rating(3)"
                                class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-3" value="3">
                        <label for="rate-4" style="--i:4"><i onclick="give_rating(4)"
                                class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-4" value="4">
                        <label for="rate-5" style="--i:5"><i onclick="give_rating(5)"
                                class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-5" value="5">
                    </span></p>
                <p style="font-size: 24px;">Write a Review:</p>
                <div><textarea class="review_text" id="review_text" cols="100" rows="10"></textarea></div>
                <button class="button-5" style="margin-left: 30px;" onclick="give_review()">Submit Review</button>
            </div>
        </div>


        <br>
        <div class="product_page_2">
            <h2>Reviews by others</h2>

            <?php
            if ($res_r && mysqli_num_rows($res_r) > 0) {
                while($row_r = mysqli_fetch_assoc($res_r)) {
            ?>
            <div style="display:flex;">
                <p style="width: 80%;"><?php echo $row_r['Cname']; ?>  :    <?php echo $row_r['user_review']; ?></p>
            </div>
            <?php 
                }
            } else {
            ?>
            <div style="display:flex;">
                <p style="width: 80%;"> No reviews Yet </p>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="gap"></div>
        <h1 style="margin-left: 200px;">Products you may also like: </h1>
            <div class="container" style="margin-left: 180px;">
                <?php
                    while ($row_rec = $result->fetch_assoc()) {
                        if ($row_rec['category'] == $row_p['category'] AND $row_rec['Pname'] != $row_p['Pname']) {
                        
                ?>
                <div class="card">
                    <div class="image">
                        <a href="product_page.php?customer=<?php echo $customer_id; ?>&product=<?php echo $row_rec['product_id']; ?>">
                        <?php $imageData = $row_rec['image'];
                        echo '<img src="' . $imageData . '" alt=""><br>'; ?>
                        </a>
                    </div>
                    <div class="caption">
                        <p class="rate">
                        <div class="card_info">
                            <div><span><?php echo $row_rec['rating'];  ?> </span><i class="fas fa-star"></i></div>
                            <div><button class="wishlist_btn"><i class="fas fa-heart" onclick="addTowishlist(<?php echo $row_rec['product_id']; ?>, <?php echo $customer_id; ?>); this.style.color = 'red';"></i>
                                    <span class="tooltiptext">Add to wishlist</span>
                                </button></div>
                        </div>
                        </p>
                        <?php 
                         $product_id = $row_rec['product_id'];
                         $discount_query = "SELECT * FROM discount WHERE product_id = $product_id";
                         $discount_result = mysqli_query($conn, $discount_query);
                         if (mysqli_num_rows($discount_result) > 0) {
                            $discount_row = mysqli_fetch_assoc($discount_result);
                            $discount_value = $discount_row['percentage'];
                            $new_price = $row_rec['price'] -($row_rec['price']*($discount_value/100));               
                        
                        ?>

                        <p class="product_name"><?php echo $row_rec['Pname'];  ?> <span style="margin-left:10px; color:red;"><b><?php echo $discount_value; ?>%Off</b></span></p>

                        <p class="price"><del><b><?php echo $row_rec['price']; ?></b>TK</del> <span style="color: red;"><?php echo $new_price; ?>TK</span></p>
                        <?php 
                         } else{
                            $new_price=$row_rec['price'];
                        ?>
                        <p class="product_name"><?php echo $row_rec['Pname'];  ?></p>

                        <p class="price"><b>৳<?php echo $new_price; ?>TK</b></p>
                        <?php
                         }
                        ?>
                        

                    </div>
                    <form id="addToCartForm" method="get">
                        <input type="hidden" name="product_id" value="<?php echo $row_rec['product_id']; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                        <?php if ($row_rec['stock'] == 0): ?>
                            <button type="button" class="button-5 stock-out" disabled>Stock Out</button>
                        <?php else: ?>
                            <button type="button" class="button-5" onclick="addToCart(<?php echo $row_rec['product_id']; ?>, <?php echo $customer_id; ?>)">Add to cart</button>
                        <?php endif; ?>

                    </form>

                </div>
                <?php
                        }
                }
                ?>
            </div>
    </section>
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
        function give_rating(rating) {
            console.log('Rating given: ' + rating);
            const varia_p = document.getElementById("prod");
            let pid = varia_p.innerText;
            console.log(pid);

            fetch('give_rating.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + pid + '&rating=' + rating,
            }).then(response => {
                if (response.ok) {
                    // If successful, display success notification
                    showNotification('Rating given', 'success');
                    setTimeout(function() {
                window.location.reload();
            }, 2000);
        } else {
            // If failed, display error notification
            showNotification('Failed to submit rating', 'error');
        }
    }).catch(error => {
        // If error occurs, display error notification
        showNotification('Error: ' + error, 'error');
    });
}
        function give_review() {
            const varia = document.getElementById("cus");
            let cid = varia.innerText;
            var reviewText = document.getElementById("review_text").value;
            console.log('Review given: ' + reviewText);
            console.log(cid);
            fetch('give_review.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=<?php echo $product_id; ?>' + '&customer_id=' + cid + '&review=' + reviewText,
            }).then(response => {
                if (response.ok) {
                    // If successful, display success notification
                    showNotification('Review posted', 'success');
                } else {
                    // If failed, display error notification
                    showNotification('Failed to submit rating', 'error');
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
