<?php
    // Include database connection file
    include 'dbconnect.php';
    $sql = "SELECT * FROM customer c JOIN adds a ON c.customer_id = a.customer_id JOIN product p ON a.product_id = p.product_id WHERE c.customer_id =" . $_GET['customer'] . " AND a.order_id='0'"; // Exclude products with order_id assigned
    $res_u = mysqli_query($conn, $sql);
    $customer_id = $_GET['customer'];
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
                <a href="menu.php?userid=<?php echo $customer_id;?>">Menu</a>
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
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">
        <div hidden id="cus">  <?php echo $customer_id ; ?></div>

        </div>


        <section>

            <div class="cart-container">
                <h1 class="cart_title">Cart</h1>
                <div class="cart_header">
                    <div>Image</div>
                    <div>Product Name</div>
                    <div>Quantity</div>
                    <div>Unit price</div>
                    <div>Price</div>
                </div>
                <?php
                if ($res_u) {
                    $totalPrice = 0;
                    while ($row_u = mysqli_fetch_assoc($res_u)) {
                        $productId = $row_u['product_id'];
                        $discount_query = "SELECT * FROM discount WHERE product_id = $productId";
                        $discount_result = mysqli_query($conn, $discount_query);
                        if (mysqli_num_rows($discount_result) > 0) {
                            $discount_row = mysqli_fetch_assoc($discount_result);
                            $discount_value = $discount_row['percentage'];
                            $new_price = $row_u['price'] -($row_u['price']*($discount_value/100));
                            $totalPrice += $new_price; 
                        }
                        else{
                            $new_price=$row_u['price'];
                            $totalPrice += $new_price; 
                        }
                                       
                ?>
                    <div class="cart_list">
                        <div><img src="<?php echo $row_u['image']; ?>" alt="<?php echo $row_u['Pname']; ?>"></div>
                        <div><p class="product_name"><?php echo $row_u['Pname']; ?></p></div>
                        <div>
                            <form action="">
                                <input value="0" placeholder="0" type="number" id="<?php echo $productId; ?>" name="quantity" min="1" max="10" onchange="myFunction(this.value, <?php echo $productId; ?>)">
                            </form>
                        </div>
                        <div><p id="unit_<?php echo $productId; ?>" class="price"><?php echo $new_price; ?></p></div>
                        <div id="total_<?php echo $productId; ?>">0</div>
                    </div>
                <?php
                    }
                } else {
                    echo "No products in the cart.";
                }
                ?>
                <!-- loop -->
                                <hr>
                <!-- Display total price -->
                <div class="cart-total">Total: <span id="totalPrice" class="accent">0 Tk</span></div>
                <!-- Change the button to submit the form -->
                <div class="cart-total">
                    <form action="" method="post">
                        <button type="submit" name="confirm_order" class="button-5">Confirm Order</button>
                        <button type="button" class="button-6" onclick="removeFromCart(<?php echo $customer_id;?>)">Remove
                        </button>

                    </form>
                    <?php
if (isset($_POST['confirm_order'])) {
    // Start a new transaction
    mysqli_begin_transaction($conn);

    try {
        $customer_id = $_GET['customer'];
        $check_order_query = "SELECT order_id FROM orders WHERE order_id = ?";
        $check_order_stmt = mysqli_prepare($conn, $check_order_query);
        do {
            $order_id = rand(100, 999);

          
            mysqli_stmt_bind_param($check_order_stmt, "i", $order_id);
            mysqli_stmt_execute($check_order_stmt);
            mysqli_stmt_store_result($check_order_stmt);
            $num_rows = mysqli_stmt_num_rows($check_order_stmt);
        } while ($num_rows > 0);

        $update_adds_query = "UPDATE adds SET order_id = ? WHERE customer_id = ? AND order_id='0'";
        $update_adds_stmt = mysqli_prepare($conn, $update_adds_query);
        mysqli_stmt_bind_param($update_adds_stmt, "ii", $order_id, $customer_id);
        $result_update_adds = mysqli_stmt_execute($update_adds_stmt);

        if (!$result_update_adds) {
            throw new Exception("Error updating adds table: " . mysqli_error($conn));
        }

        $post_data = array(
            'order_id' => $order_id,
            'total_price' => $totalPrice
        );

        $insert_order_query = "INSERT INTO orders (order_id, total_price) VALUES (?, ?)";
        $insert_order_stmt = mysqli_prepare($conn, $insert_order_query);
        mysqli_stmt_bind_param($insert_order_stmt, "id", $order_id, $totalPrice);
        $result_insert_order = mysqli_stmt_execute($insert_order_stmt);

        if ($result_insert_order) {
     
            mysqli_commit($conn);
            

            echo '<div id="notification">Order confirmed successfully! Order ID: ' . $order_id . '  Redirecting to menu </div>';
        
           
            echo '<script>
                    // Display notification
                    var notification = document.getElementById("notification");
                    notification.style.display = "block";
        
                    // Redirect after a delay
                    setTimeout(function() {
                        window.location.href = "menu.php?userid=' . $customer_id . '";
                    }, 2000);
                  </script>';
        } else {
       
            mysqli_rollback($conn);
            echo "Error inserting order details: " . mysqli_error($conn);
        }
        
        
    } catch (Exception $e) {
        
        mysqli_rollback($conn);
        echo "Error confirming order: " . $e->getMessage();
    }
}
?>

                </div>
            </div>
        </section>
    </section>
    <script>
function myFunction(quantityValue, productId) {
    var unitText = document.getElementById('unit_' + productId).innerText;
    var unit = parseFloat(unitText.replace(/[^\d.]/g, ''));
    
    // Calculate total price for the product
    var totalPrice = parseFloat(quantityValue) * unit;
    
    // Update the total price element for the product
    var totalElement = document.getElementById("total_" + productId);
    if (totalElement) {
        totalElement.innerText = totalPrice.toFixed(2); // Display total price with 2 decimal places
    }
    
    // Recalculate overall total price by summing up the total prices of all products
    var totalPriceElements = document.querySelectorAll(".cart_list #total_" + productId);
    var overallTotalPrice = 0;
    totalPriceElements.forEach(function(element) {
        overallTotalPrice += parseFloat(element.innerText);
    });
    
    // Update the overall total price displayed on the page
    var overallTotalPriceElement = document.getElementById("totalPrice");
    if (overallTotalPriceElement) {
        overallTotalPriceElement.innerText = overallTotalPrice.toFixed(2) + " Tk"; // Display overall total price with currency
    }
}

        function removeFromCart(y){
                console.log(y)
                const varia = document.getElementById("cus");
                let cid = varia.innerText;
                fetch('removefromcart.php', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'customer_id=' + cid, // Added '&' to separate parameters
                }).then(response => {
                    if (response.ok) {
                        console.log('Item deleted from cart successfully');
                        refreshPage()
                    } else {
                        console.error('Failed to delete');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            }
        function refreshPage(){
            window.location.reload();
        }
        function showNotification(message, type) {
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