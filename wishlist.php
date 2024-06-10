<?php
    // Include database connection file
    include 'dbconnect.php';
    $sql = "SELECT * FROM customer c JOIN wishlist a ON c.customer_id = a.customer_id JOIN product p ON a.product_id = p.product_id WHERE c.customer_id =" . $_GET['customer'] ; // Exclude products with order_id assigned
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

            <div class="nav_icon">
                <i class="fa-solid fa-heart"></i>
                <a href="cart.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">
        <div hidden id="cus">  <?php echo $customer_id ; ?></div>
        </div>


        <section>

            <div class="cart-container">
                <h1 class="cart_title">Wishlist</h1>
                <div class="wish_header">
                    <div>Image</div>
                    <div>Product Name</div>
                    <div>Unit price</div>
                    <div>Action</div>
                </div>
                <!-- loop -->
                <?php
                if ($res_u) {
                    while ($row_u = mysqli_fetch_assoc($res_u)) {
                        $productId = $row_u['product_id'];
                        $unitPrice = $row_u['price'];
                ?>
                <div class="wish_list">
                <div><img src="<?php echo $row_u['image']; ?>" alt="<?php echo $row_u['Pname']; ?>"></div>
                        <div><p class="product_name"><?php echo $row_u['Pname']; ?></p></div>
                        <div><p id="unit_<?php echo $productId; ?>" class="price"><?php echo $unitPrice; ?></p></div>
                    <form id="addToCartForm" method="get">
                        <input type="hidden" name="product_id" value="<?php echo $row_u['product_id']; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $row_u['customer_id']; ?>">
                        
                        <button type="button" class="button-5" onclick="addToCart(<?php echo $row_u['product_id']; ?>,<?php echo $customer_id; ?>)">Add to cart
                        </button>
                        <button type="button" class="button-6" onclick="removeFromWishlist(<?php echo $row_u['product_id']; ?>,<?php echo $customer_id;?>)">Remove
                        </button>
                    </form>
                </div>
                <?php
                    }
                } else {
                    echo "No products in the cart.";
                }
                ?>
            </div>
            



        </section>


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
            function removeFromWishlist(x,y){
                console.log(y)
                const varia = document.getElementById("cus");
                let cid = varia.innerText;
                fetch('removefromwishlist.php', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + x + '&customer_id=' + cid, // Added '&' to separate parameters
                }).then(response => {
                    if (response.ok) {
                        showNotification('Item deleted from wish successfully', 'success');
                        
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