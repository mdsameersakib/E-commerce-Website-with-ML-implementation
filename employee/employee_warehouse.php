<?php
    $page_title = "Warehouse Inventory - ShopSphere";
    include 'employee_header.php';
    include '../includes/dbconnect.php';

    // Retrieve warehouse data from the database using PDO
    try {
        $stmt = $conn->prepare("SELECT * FROM warehouse ORDER BY warehouse_id ASC");
        $stmt->execute();
        $warehouses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $warehouses = [];
    }
?>

<div class="space-y-8 mb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-baseline gap-4 border-b border-white/5 pb-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">Warehouse Management</h1>
            <p class="text-sm text-base-content/50 mt-1">Track store warehouse capacity, update inventory counts, and add new storage facilities.</p>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="toast toast-top toast-end z-50 hidden">
        <div id="toast-alert" class="alert shadow-lg">
            <span id="toast-text"></span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Warehouse Table Card (Takes 2 columns on lg screens) -->
        <div class="card bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden lg:col-span-2">
            <div class="p-6">
                <h2 class="card-title font-bold text-lg mb-4 text-primary"><i class="fa-solid fa-list-check"></i> Storage Facilities</h2>
                
                <?php if (empty($warehouses)): ?>
                    <div class="text-center py-12 text-base-content/40">
                        <i class="fa-solid fa-warehouse text-5xl mb-3 opacity-20"></i>
                        <p>No warehouse locations configured.</p>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="table w-full text-left align-middle">
                            <thead>
                                <tr class="border-b border-white/5 text-base-content/60 text-xs">
                                    <th class="py-3">Warehouse ID</th>
                                    <th class="py-3">Address</th>
                                    <th class="py-3">Postcode</th>
                                    <th class="py-3">Stock Qty</th>
                                    <th class="py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($warehouses as $row_u): ?>
                                    <tr class="border-b border-white/5 hover:bg-base-300/30 transition-colors">
                                        <td class="py-4 font-mono font-bold text-primary">#<?= htmlspecialchars($row_u['warehouse_id']) ?></td>
                                        <td class="py-4 text-sm font-semibold"><?= htmlspecialchars($row_u['address']) ?></td>
                                        <td class="py-4 text-sm font-mono opacity-80"><?= htmlspecialchars($row_u['postcode']) ?></td>
                                        <td class="py-4 text-sm font-bold text-secondary"><?= htmlspecialchars($row_u['qty']) ?> items</td>
                                        <td class="py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <input type="number" 
                                                       id="qty_input_<?= htmlspecialchars($row_u['warehouse_id']) ?>" 
                                                       class="input input-sm input-bordered w-20 rounded-xl bg-base-300/40 text-center font-bold" 
                                                       placeholder="+/-">
                                                <button class="btn btn-primary btn-sm rounded-xl font-bold px-3" 
                                                        onclick="increase_qty(<?= htmlspecialchars($row_u['warehouse_id']) ?>)" 
                                                        title="Update Qty">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Add New Warehouse Form (Takes 1 column) -->
        <div class="card bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden h-fit">
            <div class="p-6 space-y-4">
                <h2 class="card-title font-bold text-lg text-secondary"><i class="fa-solid fa-plus"></i> Add New Depot</h2>
                <div class="divider my-0"></div>
                
                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Street Address</span>
                    </label>
                    <input id="AddressId" type="text" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none" placeholder="123 Depot St">
                </div>

                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Postcode</span>
                    </label>
                    <input id="Postcode" type="text" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none font-mono" placeholder="1000">
                </div>

                <div class="form-control w-full">
                    <label class="label font-bold text-xs uppercase tracking-wider text-base-content/70">
                        <span>Initial Stock Quantity</span>
                    </label>
                    <input id="Quantity" type="number" class="input input-bordered w-full rounded-2xl bg-base-300/30 focus:border-secondary focus:outline-none" placeholder="100" min="0">
                </div>

                <div class="pt-4">
                    <button class="btn btn-secondary w-full rounded-2xl font-bold bg-gradient-to-r from-secondary to-accent border-none hover:opacity-90 shadow-lg text-white" onclick="addNewWarehouse()">
                        Create Depot
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

function increase_qty(id) {
    const input = document.getElementById('qty_input_' + id);
    const qtyVal = input.value.trim();

    if (!qtyVal) {
        showToast('Please enter a quantity value to add/subtract.', 'error');
        return;
    }

    const qty = parseInt(qtyVal, 10);
    if (isNaN(qty)) {
        showToast('Please enter a valid integer quantity.', 'error');
        return;
    }

    fetch('../actions/increase_qty.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'qty=' + qty + '&warehouse_id=' + id
    })
    .then(response => response.text())
    .then(data => {
        if (data.indexOf('successfully') !== -1) {
            showToast('Warehouse quantity updated successfully!', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1200);
        } else {
            showToast(data || 'Failed to update quantity.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Failed to update quantity.', 'error');
    });
}

function addNewWarehouse() {
    const address = document.getElementById("AddressId").value.trim();
    const postcode = document.getElementById("Postcode").value.trim();
    const quantity = document.getElementById("Quantity").value.trim();

    if (!address || !postcode || !quantity) {
        showToast('Please fill in all depot fields.', 'error');
        return;
    }

    const formData = new FormData();
    formData.append('address', address);
    formData.append('postcode', postcode);
    formData.append('quantity', quantity);

    fetch('../actions/new_warehouse.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            showToast('New depot location added successfully!', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1200);
        } else {
            showToast('Failed to add new depot.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Network error adding depot.', 'error');
    });
}
</script>

<?php include 'employee_footer.php'; ?>
