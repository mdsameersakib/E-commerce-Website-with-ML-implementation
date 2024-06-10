<?php
// Include database connection file
include 'dbconnect.php';

// Check if employee_id is set in the URL
if(isset($_GET['employee'])) {
    $employee_id = $_GET['employee'];

    // Retrieve warehouse data from the database
    $sql_u = "SELECT * FROM warehouse";
    $res_u = mysqli_query($conn, $sql_u);
    // Check if query was successful
    if($res_u) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse page</title>
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
        <div class="placeholderImg">
        </div>
        <section>
            <div class="cart-container">
                <h1 class="cart_title">Warehouse</h1>
                <table>
                    <thead>
                        <tr>
                          <th>Warehouse Id</th>
                          <th>Address</th>
                          <th>Postcode</th>
                          <th>Quantity</th>
                          <th>Update Quantity</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            while($row_u = mysqli_fetch_assoc($res_u)){
                        ?>
                        <tr>
                          <th><?php echo $row_u['warehouse_id']; ?></th>
                          <td><?php echo $row_u['address']; ?></td>
                          <td><?php echo $row_u['postcode']; ?></td>
                          <td><?php echo $row_u['qty']; ?></td>
                          <th><input type="text" id="UpdateQuantity_var_<?php echo $row_u['warehouse_id']; ?>"></th>

                          <td><button class="button-5"onclick="increase_qty(<?php echo $row_u['warehouse_id'];?>)"><i class="fa-solid fa-arrows-rotate"></i></button></td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!-- loop end -->
                      </tbody>
                      <thead>
                            <tr>
                              <th>ADD NEW</th>
                              <th><input type="text" id="AddressId"></th>
                              <th><input type="text" id="Postcode"></th>
                              <th><input type="text" id="Quantity"></th>
                              <th></th>
                              <td><button class="button-5"onclick="addNewWarehouse()">Submit</button></td>
                              
                            </tr>
                          </thead>
                </table>
                <div class="gap"></div>     
            </div>
        </section>
    </section>
    <script>
        function increase_qty(x) {
            // Ensure warehouse_id has leading zeros if necessary
            const paddedId = String(x).padStart(2, '0');
            console.log("UpdateQuantity_var_" + paddedId);

            const varia = document.getElementById("UpdateQuantity_var_" + paddedId);
            let qty = varia.value; // Use value instead of innerText to get the input value
            console.log(x);
            fetch('increase_qty.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'qty=' + qty + '&warehouse_id=' + paddedId, // Use paddedId in the body
            }).then(response => {
                if (response.ok) {
                    showNotification('Quantity updated successfully', 'success');
                    // Reload the page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    showNotification('Failed to update quantity', 'error');
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
            function addNewWarehouse() {
    // Get values from input fields
                        const address = document.getElementById("AddressId").value;
                        const postcode = document.getElementById("Postcode").value;
                        const quantity = document.getElementById("Quantity").value;

                        // Create FormData object to send data in the fetch request
                        const formData = new FormData();
                        formData.append('address', address);
                        formData.append('postcode', postcode);
                        formData.append('quantity', quantity);

                        // Send data to new_warehouse.php using fetch
                        fetch('new_warehouse.php', {
                            method: 'POST',
                            body: formData,
                        }).then(response => {
                            if (response.ok) {
                                // Show success notification
                                showNotification('New warehouse added successfully', 'success');
                                // Reload the page after 2 seconds
                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                // Show error notification
                                showNotification('Failed to add new warehouse', 'error');
                            }
                        }).catch(error => {
                            // Show error notification
                            showNotification('Error: ' + error, 'error');
                        });
                    }

    </script>
</body>

</html>
<?php
    } else {
        // Error handling for query failure
        echo "Failed to fetch warehouse data";
    }
} else {
    // Redirect to an error page or handle the absence of employee_id in URL
    // For example:
    // header("Location: error.php");
    // exit();
}
?>
