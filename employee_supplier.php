<?php
// Include database connection file
include 'dbconnect.php';

// Check if employee_id is set in the URL
if(isset($_GET['employee'])) {
    $employee_id = $_GET['employee'];

    // Retrieve warehouse data from the database
    $sql_u = "SELECT * FROM supplier where employee_id='$employee_id'";
    $res_u = mysqli_query($conn, $sql_u);
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
            <div hidden id="cus">  <?php echo $employee_id ; ?></div>
            <nav class="navbar">
                <a href="employee_menu.php?userid=<?php echo $employee_id; ?>">Menu</a>
            </nav>

            <div class="nav_icon">
            <a href="employee_profile.php?employee=<?php echo $employee_id;?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="placeholderImg">

        </div>


        <section>

            <div class="cart-container">
                <h1 class="cart_title">Supplier</h1>
                <table>
                    <thead>
                        <tr>
                          <th>Supplier Id</th>
                          <th>Brand Name</th>
                          <th>Phone Number</th>
                          <th>Email Address</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            while($row_u = mysqli_fetch_assoc($res_u)){
                        ?>
                        <tr>
                          <th><?php echo $row_u['supplier_id']; ?></th>
                          <td><?php echo $row_u['brand_name']; ?></td>
                          <td><?php echo $row_u['phone_number']; ?></td>
                          <td><?php echo $row_u['email_address']; ?></td>
                          <td><?php echo $row_u['address']; ?></td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!-- loop end -->
                        <thead>
                            <tr>
                              <th>ADD NEW</th>
                              <th><input type="text" id="BrandName"></th>
                              <th><input type="text" id="PhoneNumber"></th>
                              <th><input type="text" id="EmailAddress"></th>
                              <th><input type="text" id="Address"></th>
                              
                            </tr>
                          </thead>   
                      </tbody>
                </table>
                
                <div style="margin: 10px auto 20px 1600px;"><button class="button-5" onclick="addToSupply()">Submit</button></div>
                <div class="gap"></div>     
            </div>
            <script>
                function addToSupply() {
                    const brand_name = document.getElementById("BrandName").value.trim();
                    const phone = document.getElementById("PhoneNumber").value.trim();
                    const email = document.getElementById("EmailAddress").value.trim();
                    const address = document.getElementById("Address").value.trim();
                    const varia = document.getElementById("cus");
                    const employee_id = varia.innerText.trim();

                    fetch('addToSupply.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'brand_name=' + encodeURIComponent(brand_name) +
                            '&phone=' + encodeURIComponent(phone) + '&email=' + encodeURIComponent(email) +
                            '&address=' + encodeURIComponent(address) + '&employee_id=' + encodeURIComponent(employee_id),
                    }).then(response => {
                        if (response.ok) {
                            showNotification('Supplied successfully', 'success');
                            setTimeout(function() {
                window.location.reload();
            }, 2000);
                        } else {
                            showNotification('Failed to add item to cart', 'error');
                        }
                    }).catch(error => {
                        showNotification('Error: ' + error, 'error');
                    });
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
        </section>
    </section>
</body>

</html>
