<?php
    
    // Include database connection file
    include 'dbconnect.php';
    $employee_id = $_GET['employee'];
    // Define your SQL query
    $sql_u = "SELECT 
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
    refund.status='Proccessing'
    OR
    refund.status='On Hold'
GROUP BY product.product_id
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
                <a href="employee_menu.php?userid=<?php echo  $employee_id; ?>">Menu</a>
            </nav>

            <div class="nav_icon">
                <div hidden id="cus">  <?php echo $employee_id ; ?></div>
                <a href="employee_profile.php?employee=<?php echo $employee_id ; ?>"><i class="fa-solid fa-user"></i></a>
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
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 60%;"></div>
                            <div>
                            <button class="button-7"onclick="accept(<?php echo $product_id; ?>,<?php echo $order_id; ?>)">Accept</button>
                            <button class="button-6"onclick="reject(<?php echo $product_id; ?>,<?php echo $order_id; ?>)">Reject</button>
                            </div>
                            
                            <div ></div>
                        </div>

                        <div style="height: 30px;"></div>
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
    <script>
            function accept(x, y) {
                console.log(y);
                const varia = document.getElementById("cus");
                let cid = varia.innerText;
                fetch('refund_decisionAccept.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + x + '&order_id=' + y, // Added '&' to separate parameters
                }).then(response => {
                    if (response.ok) {
                        // If successful, display success notification
                        showNotification('Refunded successfully', 'success');
                    } else {
                        // If failed, display error notification
                        showNotification('Failed to add item to cart', 'error');
                    }
                }).catch(error => {
                    // If error occurs, display error notification
                    showNotification('Error: ' + error, 'error');
                });
            }
            function reject(x, y) {
                console.log(y);
                const varia = document.getElementById("cus");
                let cid = varia.innerText;
                fetch('refund_decisionReject.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + x + '&order_id=' + y, // Added '&' to separate parameters
                }).then(response => {
                    if (response.ok) {
                        // If successful, display success notification
                        showNotification('Put on Hold', 'success');
                    } else {
                        // If failed, display error notification
                        showNotification('Failed to add item to cart', 'error');
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