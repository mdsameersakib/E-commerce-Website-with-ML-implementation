<?php 
include '../includes/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopSphere - Admin Control Center</title>
    <!-- DaisyUI + Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../css/theme.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-base-100 text-base-content flex flex-col">
    <!-- Navbar -->
    <div class="navbar bg-base-200/90 backdrop-blur-md sticky top-0 z-50 px-4 md:px-8 border-b border-white/5 shadow-md justify-between">
        <div class="navbar-start">
            <a href="#" class="btn btn-ghost text-2xl font-extrabold text-primary gap-1 normal-case">
                <i class="fa-solid fa-holly-berry"></i> ShopSphere
                <span class="badge badge-error badge-sm font-bold uppercase tracking-wider">Admin</span>
            </a>
        </div>
        <div class="navbar-end">
            <a href="../login.php" class="btn btn-outline btn-sm rounded-xl"><i class="fa-solid fa-right-from-bracket"></i> Exit Panel</a>
        </div>
    </div>

    <!-- Main Container -->
    <main class="flex-grow p-4 md:p-8 max-w-5xl mx-auto w-full space-y-6">
        <!-- Dashboard Header -->
        <div class="border-b border-white/5 pb-4">
            <h1 class="text-3xl font-extrabold tracking-tight">System Control Center</h1>
            <p class="text-sm text-base-content/50 mt-1">Perform administrator search, manage staff registration, and inspect server configuration.</p>
        </div>

        <!-- Toast Notifications Container -->
        <div id="toast-container" class="toast toast-top toast-end z-50 hidden">
            <div id="toast-alert" class="alert shadow-lg">
                <span id="toast-text"></span>
            </div>
        </div>

        <!-- Accordions -->
        <div class="space-y-4">
            
            <!-- Accordion 1: Search Customer / Employee -->
            <div class="collapse collapse-arrow bg-base-200 border border-white/5 rounded-3xl shadow-lg">
                <input type="radio" name="admin-accordion" checked="checked" /> 
                <div class="collapse-title text-lg font-bold flex items-center gap-2 text-primary">
                    <i class="fa-solid fa-magnifying-glass"></i> Search Customer or Employee
                </div>
                <div class="collapse-content px-6 pb-6">
                    <div class="divider mt-0 mb-6"></div>
                    <form method="post" class="flex flex-col md:flex-row gap-2 max-w-2xl">
                        <input type="text" placeholder="Search by name or exact ID..." name="search" required
                               class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-primary focus:outline-none"
                               value="<?php echo htmlspecialchars($_POST['search'] ?? ''); ?>">
                        <button class="btn btn-primary rounded-2xl px-8 font-bold" name="submit">Search</button>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $search = trim($_POST['search'] ?? '');
                        $len = strlen($search);
                        
                        echo '<div class="mt-6 divider my-0"></div>';
                        echo '<div class="mt-4">';
                        
                        if ($len == 5) {
                            // Customer search
                            $stmt = $conn->prepare("SELECT * FROM customer WHERE Cname = ? OR customer_id = ?");
                            $stmt->execute([$search, $search]);
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($row) {
                                $customer_id = $row['customer_id'];
                                ?>
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-md font-bold uppercase tracking-wider text-base-content/60"><i class="fa-solid fa-user text-primary"></i> Customer Profile</h3>
                                </div>
                                <div hidden id="cus"><?php echo htmlspecialchars($customer_id); ?></div>
                                <div class="overflow-x-auto bg-base-300/30 p-4 rounded-3xl border border-white/5">
                                    <table class="table w-full text-left">
                                        <thead>
                                            <tr class="border-b border-white/5 text-base-content/60 text-xs">
                                                <th class="py-2">Customer ID</th>
                                                <th class="py-2">Customer Name</th>
                                                <th class="py-2">Phone Number</th>
                                                <th class="py-2">Email Address</th>
                                                <th class="py-2">Address</th>
                                                <th class="py-2 text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-white/5 last:border-none">
                                                <td class="font-mono text-primary py-3">#<?php echo htmlspecialchars($row['customer_id']); ?></td>
                                                <td class="font-bold py-3"><?php echo htmlspecialchars($row['Cname']); ?></td>
                                                <td class="font-mono py-3"><?php echo htmlspecialchars($row['phone']); ?></td>
                                                <td class="py-3"><?php echo htmlspecialchars($row['email']); ?></td>
                                                <td class="py-3 text-xs"><?php echo htmlspecialchars($row['address']); ?></td>
                                                <td class="py-3 text-right">
                                                    <button type="button" class="btn btn-error btn-sm rounded-xl font-bold" onclick="ban('<?php echo htmlspecialchars($customer_id); ?>')">
                                                        <i class="fa-solid fa-ban"></i> BAN
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            } else {
                                echo '<div class="alert alert-error shadow-md rounded-2xl"><i class="fa-solid fa-triangle-exclamation"></i> Customer not found.</div>';
                            }
                        } else {
                            // Employee search
                            $stmt = $conn->prepare("SELECT * FROM employee WHERE Ename = ? OR employee_id = ?");
                            $stmt->execute([$search, $search]);
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($row) {
                                $employee_id = $row['employee_id'];
                                ?>
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-md font-bold uppercase tracking-wider text-base-content/60"><i class="fa-solid fa-user-tie text-secondary"></i> Employee Profile</h3>
                                </div>
                                <div hidden id="emp"><?php echo htmlspecialchars($employee_id); ?></div>
                                <div class="overflow-x-auto bg-base-300/30 p-4 rounded-3xl border border-white/5">
                                    <table class="table w-full text-left">
                                        <thead>
                                            <tr class="border-b border-white/5 text-base-content/60 text-xs">
                                                <th class="py-2">Employee ID</th>
                                                <th class="py-2">Employee Name</th>
                                                <th class="py-2">Phone Number</th>
                                                <th class="py-2">Email Address</th>
                                                <th class="py-2">Address</th>
                                                <th class="py-2 text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-white/5 last:border-none">
                                                <td class="font-mono text-secondary py-3">#<?php echo htmlspecialchars($row['employee_id']); ?></td>
                                                <td class="font-bold py-3"><?php echo htmlspecialchars($row['Ename']); ?></td>
                                                <td class="font-mono py-3"><?php echo htmlspecialchars($row['phone']); ?></td>
                                                <td class="py-3"><?php echo htmlspecialchars($row['email']); ?></td>
                                                <td class="py-3 text-xs"><?php echo htmlspecialchars($row['address']); ?></td>
                                                <td class="py-3 text-right">
                                                    <button type="button" class="btn btn-error btn-sm rounded-xl font-bold" onclick="ban_emp('<?php echo htmlspecialchars($employee_id); ?>')">
                                                        <i class="fa-solid fa-ban"></i> BAN
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            } else {
                                echo '<div class="alert alert-error shadow-md rounded-2xl"><i class="fa-solid fa-triangle-exclamation"></i> Employee not found.</div>';
                            }
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Accordion 2: Add New Employee -->
            <div class="collapse collapse-arrow bg-base-200 border border-white/5 rounded-3xl shadow-lg">
                <input type="radio" name="admin-accordion" /> 
                <div class="collapse-title text-lg font-bold flex items-center gap-2 text-secondary">
                    <i class="fa-solid fa-user-plus"></i> Add New Employee
                </div>
                <div class="collapse-content px-6 pb-6">
                    <div class="divider mt-0 mb-6"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-4xl">
                        <!-- Username -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Username</span></label>
                            <input type="text" id="Username" placeholder="john_doe" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none">
                        </div>
                        <!-- Email -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Email Address</span></label>
                            <input type="email" id="Email" placeholder="john@example.com" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none">
                        </div>
                        <!-- Password -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Password</span></label>
                            <input type="password" id="password" placeholder="••••••••" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none">
                        </div>
                        <!-- Phone Number -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Phone Number</span></label>
                            <input type="text" id="phone_number" placeholder="+8801700000000" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none font-mono">
                        </div>
                        <!-- Address -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Home Address</span></label>
                            <input type="text" id="Address" placeholder="Mirpur, Dhaka" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none">
                        </div>
                        <!-- Type -->
                        <div class="form-control w-full">
                            <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70"><span>Staff Type / Role</span></label>
                            <input type="text" id="Type" placeholder="Logistics" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none">
                        </div>
                    </div>
                    <div class="flex justify-end max-w-4xl mt-6">
                        <button class="btn btn-secondary border-none text-white rounded-2xl px-10 font-bold shadow-lg" onclick="newEmployee()">
                            Create Employee Account
                        </button>
                    </div>
                </div>
            </div>

            <!-- Accordion 3: Database Login Info -->
            <div class="collapse collapse-arrow bg-base-200 border border-white/5 rounded-3xl shadow-lg">
                <input type="radio" name="admin-accordion" /> 
                <div class="collapse-title text-lg font-bold flex items-center gap-2 text-warning">
                    <i class="fa-solid fa-database"></i> Database Connection Profile
                </div>
                <div class="collapse-content px-6 pb-6">
                    <div class="divider mt-0 mb-6"></div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="bg-base-300/40 p-4 rounded-2xl border border-white/5">
                            <span class="text-base-content/40 text-xs block uppercase tracking-wider">Host</span>
                            <span class="font-mono font-bold">127.0.0.1</span>
                        </div>
                        <div class="bg-base-300/40 p-4 rounded-2xl border border-white/5">
                            <span class="text-base-content/40 text-xs block uppercase tracking-wider">Port</span>
                            <span class="font-mono font-bold">3306</span>
                        </div>
                        <div class="bg-base-300/40 p-4 rounded-2xl border border-white/5">
                            <span class="text-base-content/40 text-xs block uppercase tracking-wider">Database</span>
                            <span class="font-mono font-bold">online_shop</span>
                        </div>
                        <div class="bg-base-300/40 p-4 rounded-2xl border border-white/5">
                            <span class="text-base-content/40 text-xs block uppercase tracking-wider">Username</span>
                            <span class="font-mono font-bold">root</span>
                        </div>
                        <div class="bg-base-300/40 p-4 rounded-2xl border border-white/5">
                            <span class="text-base-content/40 text-xs block uppercase tracking-wider">Password</span>
                            <span class="font-mono font-bold opacity-55">empty</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="footer p-6 bg-base-200 text-base-content border-t border-white/5 text-center flex justify-between items-center mt-auto">
        <aside class="items-center grid-flow-col">
            <p>&copy; <?php echo date('Y'); ?> ShopSphere. Administrative Control Utility.</p>
        </aside>
    </footer>

    <script>
    function showNotification(message, type, callback) {
        const toast = document.getElementById('toast-container');
        const alertBox = document.getElementById('toast-alert');
        const toastText = document.getElementById('toast-text');
        
        alertBox.className = 'alert shadow-lg ' + (type === 'success' ? 'alert-success' : 'alert-error');
        toastText.innerText = message;
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            toast.classList.add('hidden');
            if (callback) callback();
        }, 1500);
    }

    function ban(cid) {
        if (!confirm('Are you sure you want to delete/ban this customer: ' + cid + '?')) return;
        
        fetch('../actions/ban.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'customer_id=' + encodeURIComponent(cid),
        }).then(response => {
            if (response.ok) {
                showNotification('Customer banned/deleted successfully!', 'success', () => {
                    location.reload();
                });
            } else {
                showNotification('Failed to ban customer.', 'error');
            }
        }).catch(error => {
            showNotification('Error: ' + error, 'error');
        });
    }

    function ban_emp(eid) {
        if (!confirm('Are you sure you want to delete/ban this employee: ' + eid + '?')) return;

        fetch('../actions/ban_emp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'employee_id=' + encodeURIComponent(eid),
        }).then(response => {
            if (response.ok) {
                showNotification('Employee banned/deleted successfully!', 'success', () => {
                    location.reload();
                });
            } else {
                showNotification('Failed to ban employee.', 'error');
            }
        }).catch(error => {
            showNotification('Error: ' + error, 'error');
        });
    }

    function newEmployee() {
        const username = document.getElementById("Username").value.trim();
        const email = document.getElementById("Email").value.trim();
        const password = document.getElementById("password").value.trim();
        const phoneNumber = document.getElementById("phone_number").value.trim();
        const address = document.getElementById("Address").value.trim();
        const type = document.getElementById("Type").value.trim();

        if (!username || !email || !password) {
            showNotification('Username, email, and password are required.', 'error');
            return;
        }

        const formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('phoneNumber', phoneNumber);
        formData.append('address', address);
        formData.append('type', type);

        fetch('../actions/new_employee.php', {
            method: 'POST',
            body: formData,
        }).then(response => {
            if (response.ok) {
                showNotification('New employee added successfully!', 'success', () => {
                    location.reload();
                });
            } else {
                showNotification('Failed to add new employee.', 'error');
            }
        }).catch(error => {
            showNotification('Error: ' + error, 'error');
        });
    }
    </script>
</body>
</html>
