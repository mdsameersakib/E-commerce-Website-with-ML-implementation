<?php 
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html data-theme="light">

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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div
        style="display: flex; height: 100px; background-color:#21262f; justify-content: space-evenly; align-items: center;">
        <span style="font-weight: bold; font-size:42px; color: white; font-style: italic;">. . Admin Panel . .</span>

    </div>

    <div class="gap"></div>
    <div class="collapse collapse-arrow bg-slate-200 hover:bg-slate-100 w-11/12 m-auto">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Search Customer or Employee
        </div>
        <div class="collapse-content">

            <div class="cart-container"
                style="height: fit-content; margin-top: 100px; border-radius: 15px; box-shadow: 1px 2px 5px grey;">
                <div style="width: fit-content; margin: auto;font-size: 24px;">
                    <div class="gap"></div>
                    <div  class="flex flex-row-reverse ">
                        <form method="post">
                            <input type="text" placeholder="Search data" name="search" class="admin_search bg-slate-100"
                                style="width: 500px; padding-left: 20px; border-radius: 15px 0px 0px 15px; margin-right: 0px; height: 45px;">
                            <button class="button-5" name="submit"
                                style="padding-top: 5px;margin-left: 0px;border-radius: 0px 10px 10px 0px;">Search</button>
                        </form>
                    </div>

                    <div class="gap"></div>

                </div>
                
                <?php
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    $len = strlen($search);
                    if ($len == 5) {
                    $query = "SELECT * FROM customer WHERE Cname='$search' OR customer_id='$search'";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0) {
                        $row = mysqli_fetch_array($query_run);
                        $customer_id=$row['customer_id'];
                        ?>
                        <div style="width: fit-content; margin: auto;font-size: 24px;" ><h1>Customer Profile</h1></div> 
                        <div class="h-4"></div>
                            <table>
                            <div hidden id="cus">  <?php echo $customer_id ; ?></div>
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Email Address</th>
                                        <th>Address</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['customer_id']; ?></td>
                                        <td><?php echo $row['Cname']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><button type="button" class="button-6" style="background-color: red;" onclick="ban(<?php echo $customer_id; ?>)">BAN
                                        </button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="gap"></div>
            
                        <?php
                    } else {
                        ?>
                        <div class="cart-container">Customer not found</div>
                        <?php 
                        }
                    } else{
                        $query = "SELECT * FROM employee WHERE Ename='$search' OR employee_id='$search'";
                        $query_run = mysqli_query($conn, $query);
                
                        if(mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_array($query_run);
                            $employee_id=$row['employee_id'];
                            ?>
                            <div style="width: fit-content; margin: auto;font-size: 24px;" ><h1>Employee Profile</h1></div> 
                            <div class="h-4"></div>
                                <table>
                                <div hidden id="emp">  <?php echo $employee_id ; ?></div>
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Address</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['employee_id']; ?></td>
                                            <td><?php echo $row['Ename']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><button type="button" class="button-6" style="background-color: red;" onclick="ban_emp(<?php echo $employee_id; ?>)">BAN
                                            </button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="gap"></div>
                
                            <?php
                        } else {
                            ?>
                           <div class="cart-container" style="font-size: 20px;">Customer not found</div>
            
                            <?php 
                            }
            
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
    <div class="h-4"></div>
    <div class="collapse collapse-arrow bg-slate-200 hover:bg-slate-100 w-11/12 m-auto">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Add new employee
        </div>
        <div class="collapse-content">
            <div class="flex flex-col justify-center gap-x-20 bg-slate-200 px-20 py-10 rounded">
                <div class="flex gap-x-20 bg-slate-200 px-20 py-10 ">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow" placeholder="Username" id="Username" />
                    </label>

                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path
                                d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path
                                d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="grow" placeholder="Email" id="Email" />
                    </label>

                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow" placeholder="password" id="password"/>
                    </label>
                </div>
                <div class="flex gap-20 bg-slate-200 px-20 py-5 ">
                    <label class="input input-bordered flex items-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" class="grow" placeholder="Phone Number" id="phone_number" />
                    </label>

                    <label class="input input-bordered flex items-center gap-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" class="grow" placeholder="Address" id="Address"/>
                    </label>

                    <label class="input input-bordered flex items-center gap-2">
                        <i class="fa-solid fa-user-tie"></i>
                        <input type="text" class="grow" placeholder="Type" id="Type"/>
                    </label>
                </div>
                <div class="flex flex-row-reverse w-10/12">
                    <button class="btn btn-accent w-40" onclick="newEmployee('sada')">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="h-4"></div>
    <div class="collapse collapse-arrow bg-slate-200 hover:bg-slate-100 w-11/12 m-auto">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
           Database Login Info
        </div>
        <div class="collapse-content">

            <div class="cart-container"
                style="height: fit-content; margin-top: 100px; border-radius: 15px; box-shadow: 1px 2px 5px grey;">
                <div style="width: fit-content; margin: auto;font-size: 24px;">
                    <div class="gap"></div>
                    <div  class="flex flex-row-reverse ">
                        <div>
                        <h1 class="cart_title"><b>user=</b>"root"</h1>
                        <h1 class="cart_title"><b>password=</b>password=""</h1>
                        <h1 class="cart_title"><b>host=</b>"127.0.0.1"</h1>
                        <h1 class="cart_title"><b>port=</b>3306</h1>
                        <h1 class="cart_title"><b>database=</b>"online_shop"</h1>
                        </div>
                    </div>

                    <div class="gap"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="gap"></div>
    <script>
       function ban(x) {
    const varia = document.getElementById("cus");
    let cid = varia.innerText;
    console.log(cus);
    fetch('ban.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'customer_id=' + cid, // Added '&' to separate parameters
    }).then(response => {
        if (response.ok) {
            showNotification('Customer banned successfully', 'success', () => {
                setTimeout(() => {
                    location.reload(); // Reload the page after 2 seconds
                }, 2000);
            });
        } else {
            showNotification('Failed to ban customer', 'error');
        }
    }).catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function ban_emp(x) {
    const varia = document.getElementById("emp");
    let eid = varia.innerText;
    console.log(eid);
    fetch('ban_emp.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'employee_id=' + eid, // Added '&' to separate parameters
    }).then(response => {
        if (response.ok) {
            showNotification('Employee banned successfully', 'success', () => {
                setTimeout(() => {
                    location.reload(); // Reload the page after 2 seconds
                }, 2000);
            });
        } else {
            showNotification('Failed to ban employee', 'error');
        }
    }).catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function newEmployee(x) {
    console.log("lala");
    const username = document.getElementById("Username").value;
    const email = document.getElementById("Email").value;
    const password = document.getElementById("password").value;
    const phoneNumber = document.getElementById("phone_number").value;
    const address = document.getElementById("Address").value;
    const type = document.getElementById("Type").value;

    // Create FormData object to send data in the fetch request
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('phoneNumber', phoneNumber);
    formData.append('address', address);
    formData.append('type', type);

    // Send data to new_employee.php using fetch
    fetch('new_employee.php', {
        method: 'POST',
        body: formData,
    }).then(response => {
        if (response.ok) {
            showNotification('New employee added successfully', 'success', () => {
                setTimeout(() => {
                    location.reload(); // Reload the page after 2 seconds
                }, 2000);
            });
        } else {
            showNotification('Failed to add new employee', 'error');
        }
    }).catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function showNotification(message, type, callback) {
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
            if (callback) {
                callback(); // Invoke the callback function if provided
            }
        }, 500); // Transition duration
    }, 1000); // Notification duration
}





</script>


</body>


</html>