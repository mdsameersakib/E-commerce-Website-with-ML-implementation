<?php
    // Include database connection file
    include 'dbconnect.php';
    // Check if customer_id is set in the URL
    if(isset($_GET['employee'])) {
        $employee_id = $_GET['employee'];

        // Retrieve customer data from the database
        $sql_u = "SELECT * FROM employee WHERE employee_id = $employee_id";
        $res_u = mysqli_query($conn, $sql_u);
        $row_u = mysqli_fetch_assoc($res_u);
    } else {
        // Redirect to an error page or handle the absence of customer_id in URL
        // For example:
        // header("Location: error.php");
        // exit();
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
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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
                <a href="employee_menu.php?userid=<?php echo $employee_id; ?>">Menu</a>
            </nav>
            <div class="nav_icon">                
                <a href="employee_profile.php?employee=<?php echo $employee_id;?>"><i class="fa-solid fa-user"></i></a>
            </div>

        </header>
        <div class="gap"></div>
        <div hidden id="cus">  <?php echo $employee_id ; ?></div>
        <section class="profile_box">
            <h1 class="title">User ID: <span class="Cusername"><?php echo $employee_id; ?></span></h1>
            <hr>
             <form id="profileForm" class="profile" onsubmit="return false;">
                <div>
                    <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName:</span>
                    <input id="nameInput" class="box2" type="text" placeholder="<?php echo $row_u['Ename'];?>">
                    <button class="button-5" onclick="update_name(<?php echo  $employee_id; ?>)">Update</button>
                </div>
                <div>
                    <span>Password:</span>
                    <input id="passInput" class="box2" type="text" placeholder="<?php echo $row_u['password'];?>">
                    <button class="button-5"onclick="update_password(<?php echo  $employee_id; ?>)">Update</button>
                </div>
                <div>
                    <span>&nbsp&nbsp&nbspAddress:</span>
                    <input id="addressInput" class="box2" type="text" placeholder="<?php echo $row_u['address'];?>">
                    <button class="button-5"onclick="update_address(<?php echo $employee_id; ?>)">Update</button>
                </div>
            </form>
        </section>
    </section>
    <script>

        function update_name(customer_id) {
            const varia = document.getElementById("cus");
            let eid = varia.innerText
            var nameInputValue = document.getElementById("nameInput").value;
            console.log("Name input value:", nameInputValue);
            console.log("Customer ID:", eid);
            // Here you can add AJAX request to update the name in the database
            fetch('employee_updateName.php', {

            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'new_name=' + nameInputValue + '&employee_id=' + eid, // Added '&' to separate parameters
            }).then(response => {
                    if (response.ok) {
                        showNotification('Name Changed', 'success');
                        sleep(1000).then(() => { refreshPage(); });
                    } else {
                        console.error('Fail');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
        }
        function update_password(customer_id) {
            const varia = document.getElementById("cus");
            let eid = varia.innerText
            var nameInputValue = document.getElementById("passInput").value;
            console.log("Name input value:", nameInputValue);
            console.log("Customer ID:", eid);
            // Here you can add AJAX request to update the name in the database
            fetch('employee_updatePass.php', {

            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'new_password=' + nameInputValue + '&employee_id=' + eid, // Added '&' to separate parameters
            }).then(response => {
                    if (response.ok) {
                        showNotification('Password Changed', 'success');
                        sleep(1000).then(() => { refreshPage(); });
                  
                    } else {
                        console.error('Fail');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
        }
        function update_address(customer_id) {
            const varia = document.getElementById("cus");
            let eid = varia.innerText
            var nameInputValue = document.getElementById("addressInput").value;
            console.log("Name input value:", nameInputValue);
            console.log("Customer ID:", eid);
            // Here you can add AJAX request to update the name in the database
            fetch('employee_updateAddress.php', {

            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'new_address=' + nameInputValue + '&employee_id=' + eid, // Added '&' to separate parameters
            }).then(response => {
                    if (response.ok) {
                        showNotification('Address Changed', 'success');
                        sleep(1000).then(() => { refreshPage(); });

                    } else {
                        console.error('Fail');
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
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        function redirectToOrderList() {
        // Retrieve customer ID from the hidden element
        const customerId = document.getElementById("cus").innerText;

        // Redirect to orderlist.php with customer ID as a query parameter
        window.location.href = `orderlist.php?customer=${customerId}`;
        }
        function redirectToRefund() {
        // Retrieve customer ID from the hidden element
        const customerId = document.getElementById("cus").innerText;

        // Redirect to orderlist.php with customer ID as a query parameter
        window.location.href = `refund_list.php?customer=${customerId}`;
        }
    </script>
</body>
</html>
