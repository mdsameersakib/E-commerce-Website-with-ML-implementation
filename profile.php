<?php
    $page_title = "ShopSphere - My Profile";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    // Retrieve customer data from the database using PDO
    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id = ?");
    $stmt->execute([$userid]);
    $row_u = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row_u) {
        header("Location: login.php");
        exit();
    }
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">Account Settings</h1>
        <p class="text-sm text-base-content/50 mt-1">Manage your profile details and preferences</p>
    </div>
    <div class="badge badge-outline badge-primary font-semibold py-3 px-4">User ID: #<?= str_pad($userid, 5, '0', STR_PAD_LEFT) ?></div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
    <!-- Left Column: Quick Actions & Stats -->
    <div class="lg:col-span-1 flex flex-col gap-6">
        <!-- Profile summary card -->
        <div class="card bg-base-200 border border-white/5 shadow-xl p-6 rounded-3xl items-center text-center">
            <div class="avatar mb-4">
                <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-primary to-secondary text-primary-content flex items-center justify-center border-4 border-white/10">
                    <span class="text-4xl font-extrabold"><?= strtoupper(substr($row_u['Cname'], 0, 2)) ?></span>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-base-content"><?= htmlspecialchars($row_u['Cname']) ?></h2>
            <p class="text-xs text-base-content/60 mt-1"><?= htmlspecialchars($row_u['email']) ?></p>
            <div class="divider my-4"></div>
            <div class="w-full flex flex-col gap-2">
                <button class="btn btn-neutral btn-block justify-start gap-3 text-sm font-semibold" onclick="redirectToOrderList()">
                    <i class="fa-solid fa-receipt text-primary"></i> Order History
                </button>
                <button class="btn btn-neutral btn-block justify-start gap-3 text-sm font-semibold" onclick="redirectToRefund()">
                    <i class="fa-solid fa-rotate-left text-secondary"></i> Refund Requests
                </button>
            </div>
        </div>
    </div>

    <!-- Right Column: Settings Form -->
    <div class="lg:col-span-2 card bg-base-200 border border-white/5 shadow-xl p-6 md:p-8 rounded-3xl">
        <h2 class="text-xl font-bold mb-6 border-b border-white/5 pb-2">Profile Details</h2>
        
        <div class="space-y-6">
            <!-- Update Name -->
            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Display Name</span></label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input id="nameInput" type="text" value="<?= htmlspecialchars($row_u['Cname']) ?>" class="input input-bordered flex-grow focus:outline-none focus:border-primary" />
                    <button class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none text-white font-bold px-6 shadow-md" onclick="update_name()">Update</button>
                </div>
            </div>

            <!-- Update Password -->
            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Change Password</span></label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input id="passInput" type="password" placeholder="Enter new password" class="input input-bordered flex-grow focus:outline-none focus:border-primary" />
                    <button class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none text-white font-bold px-6 shadow-md" onclick="update_password()">Update</button>
                </div>
            </div>

            <!-- Update Address -->
            <div class="form-control">
                <label class="label"><span class="label-text font-semibold">Delivery Address</span></label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input id="addressInput" type="text" value="<?= htmlspecialchars($row_u['address']) ?>" class="input input-bordered flex-grow focus:outline-none focus:border-primary" />
                    <button class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none text-white font-bold px-6 shadow-md" onclick="update_address()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function update_name() {
    const nameVal = document.getElementById("nameInput").value.trim();
    if (!nameVal) {
        showNotification('Name cannot be empty.', 'error');
        return;
    }

    const formData = new URLSearchParams();
    formData.append('new_name', nameVal);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/updateName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Name updated successfully!', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to update name.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function update_password() {
    const passVal = document.getElementById("passInput").value;
    if (!passVal) {
        showNotification('Password cannot be empty.', 'error');
        return;
    }

    const formData = new URLSearchParams();
    formData.append('new_password', passVal);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/updatePass.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Password updated successfully!', 'success');
            document.getElementById("passInput").value = '';
        } else {
            showNotification('Failed to update password.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function update_address() {
    const addressVal = document.getElementById("addressInput").value.trim();
    if (!addressVal) {
        showNotification('Address cannot be empty.', 'error');
        return;
    }

    const formData = new URLSearchParams();
    formData.append('new_address', addressVal);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/updateAddress.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Address updated successfully!', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to update address.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function redirectToOrderList() {
    window.location.href = 'orderlist.php?customer=<?= urlencode($userid) ?>';
}

function redirectToRefund() {
    window.location.href = 'refund_list.php?customer=<?= urlencode($userid) ?>';
}

function showNotification(message, type) {
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast toast-top toast-end z-[9999]';
        document.body.appendChild(toastContainer);
    }
    
    const alertClass = type === 'success' ? 'alert-success' : 'alert-error';
    const icon = type === 'success' 
        ? '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
        : '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
        
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert ${alertClass} shadow-lg py-2.5 transition-all duration-300 transform translate-x-full opacity-0`;
    alertDiv.innerHTML = `
        <div class="flex items-center gap-2">
            ${icon}
            <span class="text-sm font-semibold">${message}</span>
        </div>
    `;
    
    toastContainer.appendChild(alertDiv);
    
    setTimeout(() => {
        alertDiv.classList.remove('translate-x-full', 'opacity-0');
    }, 10);
    
    setTimeout(() => {
        alertDiv.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            alertDiv.remove();
        }, 300);
    }, 3000);
}
</script>

<?php include 'includes/footer.php'; ?>
