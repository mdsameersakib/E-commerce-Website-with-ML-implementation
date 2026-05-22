<?php
    $page_title = "Logistics Suppliers - ShopSphere";
    include 'employee_header.php';
    include '../includes/dbconnect.php';

    // Retrieve supplier data from the database using PDO for this specific employee
    try {
        $stmt = $conn->prepare("SELECT * FROM supplier WHERE employee_id = ? ORDER BY supplier_id ASC");
        $stmt->execute([$userid]);
        $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $suppliers = [];
    }
?>

<div class="space-y-8 mb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-baseline gap-4 border-b border-white/5 pb-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">Suppliers & Logistics</h1>
            <p class="text-sm text-base-content/50 mt-1">Manage brand partnerships, supplier details, and logistics pipelines.</p>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="toast toast-top toast-end z-50 hidden">
        <div id="toast-alert" class="alert shadow-lg">
            <span id="toast-text"></span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Supplier Table Card (Takes 2 columns on lg screens) -->
        <div class="card bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden lg:col-span-2">
            <div class="p-6">
                <h2 class="card-title font-bold text-lg mb-4 text-primary"><i class="fa-solid fa-truck-ramp-box"></i> Associated Suppliers</h2>
                
                <?php if (empty($suppliers)): ?>
                    <div class="text-center py-12 text-base-content/40">
                        <i class="fa-solid fa-boxes-stacked text-5xl mb-3 opacity-20"></i>
                        <p>No suppliers assigned to your account yet.</p>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="table w-full text-left align-middle">
                            <thead>
                                <tr class="border-b border-white/5 text-base-content/60 text-xs">
                                    <th class="py-3">Supplier ID</th>
                                    <th class="py-3">Brand / Brand Name</th>
                                    <th class="py-3">Contact Details</th>
                                    <th class="py-3">Physical Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($suppliers as $row_u): ?>
                                    <tr class="border-b border-white/5 hover:bg-base-300/30 transition-colors">
                                        <td class="py-4 font-mono font-bold text-primary">#<?= htmlspecialchars($row_u['supplier_id']) ?></td>
                                        <td class="py-4 text-sm font-bold"><?= htmlspecialchars($row_u['brand_name']) ?></td>
                                        <td class="py-4 text-sm space-y-1">
                                            <div class="flex items-center gap-1.5"><i class="fa-solid fa-phone text-xs opacity-50"></i> <span class="font-mono text-xs"><?= htmlspecialchars($row_u['phone_number']) ?></span></div>
                                            <div class="flex items-center gap-1.5"><i class="fa-solid fa-envelope text-xs opacity-50"></i> <span class="text-xs opacity-80"><?= htmlspecialchars($row_u['email_address']) ?></span></div>
                                        </td>
                                        <td class="py-4 text-xs max-w-[200px] truncate opacity-90"><?= htmlspecialchars($row_u['address']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Add New Supplier Form (Takes 1 column) -->
        <div class="card bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden h-fit">
            <div class="p-6 space-y-4">
                <h2 class="card-title font-bold text-lg text-secondary"><i class="fa-solid fa-user-plus"></i> Onboard Partner</h2>
                <div class="divider my-0"></div>
                
                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Brand / Corporate Name</span>
                    </label>
                    <input id="BrandName" type="text" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none" placeholder="Acme Corp">
                </div>

                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Phone Number</span>
                    </label>
                    <input id="PhoneNumber" type="text" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none font-mono" placeholder="+8801700000000">
                </div>

                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Email Address</span>
                    </label>
                    <input id="EmailAddress" type="email" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none" placeholder="contact@acme.com">
                </div>

                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Address</span>
                    </label>
                    <input id="Address" type="text" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none" placeholder="Factory Road, Dhaka">
                </div>

                <div class="pt-4">
                    <button class="btn btn-secondary w-full rounded-2xl font-bold border-none hover:opacity-90 shadow-lg text-white" onclick="addToSupply()">
                        Register Partner
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast-container');
    const alertBox = document.getElementById('toast-alert');
    const toastText = document.getElementById('toast-text');
    
    alertBox.className = 'alert shadow-lg ' + (type === 'success' ? 'alert-success' : 'alert-error');
    toastText.innerText = message;
    toast.classList.remove('hidden');
    
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 3000);
}

function addToSupply() {
    const brand_name = document.getElementById("BrandName").value.trim();
    const phone = document.getElementById("PhoneNumber").value.trim();
    const email = document.getElementById("EmailAddress").value.trim();
    const address = document.getElementById("Address").value.trim();
    const employee_id = <?= json_encode($userid); ?>;

    if (!brand_name || !phone || !email || !address) {
        showToast('Please fill in all partner information.', 'error');
        return;
    }

    const body = 'brand_name=' + encodeURIComponent(brand_name) +
                 '&phone=' + encodeURIComponent(phone) + 
                 '&email=' + encodeURIComponent(email) +
                 '&address=' + encodeURIComponent(address) + 
                 '&employee_id=' + encodeURIComponent(employee_id);

    fetch('../actions/addToSupply.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: body,
    })
    .then(response => response.text())
    .then(data => {
        if (data.indexOf('successfully') !== -1) {
            showToast('Supplier partner onboarded successfully!', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1200);
        } else {
            showToast(data || 'Failed to onboard supplier.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Network error onboarding supplier.', 'error');
    });
}
</script>

<?php include 'employee_footer.php'; ?>
