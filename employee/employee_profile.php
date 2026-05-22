<?php
    $page_title = "Staff Profile - ShopSphere";
    include 'employee_header.php';
    include '../includes/dbconnect.php';

    // Retrieve employee data from the database using PDO
    $stmt = $conn->prepare("SELECT * FROM employee WHERE employee_id = ?");
    $stmt->execute([$userid]);
    $row_u = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row_u) {
        $row_u = ['Ename' => '', 'password' => '', 'address' => ''];
    }
?>

<div class="max-w-2xl mx-auto my-8">
    <div class="card bg-base-200 border border-white/5 shadow-2xl rounded-3xl overflow-hidden">
        <div class="p-6 md:p-8 space-y-6">
            <!-- Title -->
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Staff Account Settings</h1>
                <p class="text-sm text-base-content/50 mt-1">Review and update your staff profile information below.</p>
            </div>
            
            <div class="divider my-0"></div>

            <!-- Toast Container -->
            <div id="toast-container" class="toast toast-top toast-end z-50 hidden">
                <div class="alert alert-success shadow-lg">
                    <span id="toast-text">Profile updated successfully!</span>
                </div>
            </div>

            <!-- Profile Info Card -->
            <div class="bg-base-300/30 border border-white/5 rounded-2xl p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-id-badge"></i>
                </div>
                <div>
                    <span class="text-base-content/40 text-xs block uppercase tracking-wider font-semibold">Employee ID</span>
                    <span class="font-extrabold text-base text-base-content">#<?= htmlspecialchars($userid) ?></span>
                </div>
            </div>

            <!-- Form Container -->
            <div class="space-y-4">
                <!-- Update Name -->
                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/75">
                        <span>Staff Name</span>
                    </label>
                    <div class="flex gap-2">
                        <input id="nameInput" type="text" class="input input-bordered flex-grow rounded-2xl bg-base-300/30 focus:border-primary focus:outline-none" placeholder="<?= htmlspecialchars($row_u['Ename']) ?>">
                        <button class="btn btn-primary rounded-2xl font-bold px-6" onclick="updateField('name')">Update</button>
                    </div>
                </div>

                <!-- Update Password -->
                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/75">
                        <span>Password</span>
                    </label>
                    <div class="flex gap-2">
                        <input id="passInput" type="password" class="input input-bordered flex-grow rounded-2xl bg-base-300/30 focus:border-primary focus:outline-none" placeholder="••••••••">
                        <button class="btn btn-primary rounded-2xl font-bold px-6" onclick="updateField('password')">Update</button>
                    </div>
                </div>

                <!-- Update Address -->
                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/75">
                        <span>Physical Address</span>
                    </label>
                    <div class="flex gap-2">
                        <input id="addressInput" type="text" class="input input-bordered flex-grow rounded-2xl bg-base-300/30 focus:border-primary focus:outline-none" placeholder="<?= htmlspecialchars($row_u['address'] ?: 'Enter address') ?>">
                        <button class="btn btn-primary rounded-2xl font-bold px-6" onclick="updateField('address')">Update</button>
                    </div>
                </div>
            </div>
            
            <div class="divider"></div>
            
            <div class="card-actions justify-start">
                <a href="employee_menu.php?userid=<?= urlencode($userid) ?>" class="btn btn-ghost rounded-2xl px-6">
                    <i class="fa-solid fa-chevron-left mr-2"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function showToast(message) {
    const toast = document.getElementById('toast-container');
    const toastText = document.getElementById('toast-text');
    toastText.innerText = message;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 3000);
}

function updateField(field) {
    const employee_id = <?= json_encode($userid); ?>;
    let url = '';
    let body = '';
    let val = '';

    if (field === 'name') {
        val = document.getElementById('nameInput').value.trim();
        if (!val) {
            alert('Please enter a new name.');
            return;
        }
        url = '../actions/employee_updateName.php';
        body = `new_name=${encodeURIComponent(val)}&employee_id=${encodeURIComponent(employee_id)}`;
    } else if (field === 'password') {
        val = document.getElementById('passInput').value.trim();
        if (!val) {
            alert('Please enter a new password.');
            return;
        }
        url = '../actions/employee_updatePass.php';
        body = `new_password=${encodeURIComponent(val)}&employee_id=${encodeURIComponent(employee_id)}`;
    } else if (field === 'address') {
        val = document.getElementById('addressInput').value.trim();
        if (!val) {
            alert('Please enter a new address.');
            return;
        }
        url = '../actions/employee_updateAddress.php';
        body = `new_address=${encodeURIComponent(val)}&employee_id=${encodeURIComponent(employee_id)}`;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: body
    })
    .then(response => response.text())
    .then(data => {
        showToast(`${field.charAt(0).toUpperCase() + field.slice(1)} updated successfully!`);
        setTimeout(() => {
            window.location.reload();
        }, 1200);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Update failed.');
    });
}
</script>

<?php include 'employee_footer.php'; ?>
