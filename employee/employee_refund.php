<?php
    $page_title = "Manage Refund Claims - ShopSphere";
    include 'employee_header.php';
    include '../includes/dbconnect.php';

    // Retrieve refund requests with status 'Processing' or 'On Hold' using PDO
    try {
        $sql_u = "SELECT 
                      r.*,
                      p.Pname,
                      o.total_price,
                      a.quantity
                  FROM 
                      refund r
                  INNER JOIN 
                      product p ON r.product_id = p.product_id
                  INNER JOIN 
                      orders o ON r.order_id = o.order_id
                  INNER JOIN 
                      adds a ON r.product_id = a.product_id AND r.order_id = a.order_id AND r.customer_id = a.customer_id
                  WHERE
                      r.status = 'Processing' OR r.status = 'Proccessing' OR r.status = 'On Hold'
                  ORDER BY r.order_id DESC";

        $stmt_u = $conn->query($sql_u);
        $refunds = $stmt_u->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $refunds = [];
    }
?>

<div class="space-y-8 mb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-baseline gap-4 border-b border-white/5 pb-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">Customer Refund Claims</h1>
            <p class="text-sm text-base-content/50 mt-1">Review customer evidence, inspect product issue claims, and approve or reject refund applications.</p>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="toast toast-top toast-end z-50 hidden">
        <div id="toast-alert" class="alert shadow-lg">
            <span id="toast-text"></span>
        </div>
    </div>

    <div class="space-y-6">
        <?php if (empty($refunds)): ?>
            <div class="card bg-base-200 border border-white/5 shadow-xl p-12 text-center rounded-3xl">
                <div class="text-6xl opacity-20 mb-4"><i class="fa-solid fa-circle-check"></i></div>
                <h2 class="text-xl font-bold text-base-content/60">All Caught Up!</h2>
                <p class="text-sm text-base-content/40 mt-1">There are no pending refund claims to review.</p>
            </div>
        <?php else: ?>
            <?php
                foreach ($refunds as $row) {
                    $order_id = $row['order_id'];
                    $product_id = $row['product_id'];
                    $product_name = $row['Pname'];
                    $imageFilename = $row['img'];
                    $quantity = $row['quantity'];
                    $total = $row['total_price'];
                    $reason = $row['reason'];
                    $status = $row['status'];
                    $customer_id_refund = $row['customer_id'];

                    if (preg_match('/^[a-f0-9]{32}\.(jpg|jpeg|png|webp)$/i', $imageFilename)) {
                        $imageSrc = '../uploads/' . htmlspecialchars($imageFilename);
                    } else {
                        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageFilename);
                    }

                    $statusBadgeClass = (strtolower($status) === 'on hold') ? 'badge-warning' : 'badge-info';
            ?>
                <!-- Refund Request Item -->
                <div class="card md:card-side bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden hover:border-white/10 transition-all">
                    <!-- Evidence Image -->
                    <figure class="md:w-72 h-56 md:h-auto bg-base-300 relative overflow-hidden flex-shrink-0">
                        <img src="<?= $imageSrc ?>" alt="Evidence" class="object-cover w-full h-full" />
                    </figure>

                    <!-- Information & Actions -->
                    <div class="card-body p-6 justify-between">
                        <div>
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                <h2 class="card-title text-lg font-bold text-base-content"><?= htmlspecialchars($product_name) ?></h2>
                                <span class="badge <?= $statusBadgeClass ?> font-semibold py-2.5 px-3"><?= htmlspecialchars($status) ?></span>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-sm mt-3 bg-base-300/40 p-3 rounded-2xl border border-white/5">
                                <div>
                                    <span class="text-base-content/40 text-xs block">Customer</span>
                                    <span class="font-bold">#<?= htmlspecialchars($customer_id_refund) ?></span>
                                </div>
                                <div>
                                    <span class="text-base-content/40 text-xs block">Order ID</span>
                                    <span class="font-bold">#<?= htmlspecialchars($order_id) ?></span>
                                </div>
                                <div>
                                    <span class="text-base-content/40 text-xs block">Product ID</span>
                                    <span class="font-bold">#<?= htmlspecialchars($product_id) ?></span>
                                </div>
                                <div>
                                    <span class="text-base-content/40 text-xs block">Quantity</span>
                                    <span class="font-bold"><?= htmlspecialchars($quantity) ?></span>
                                </div>
                                <div>
                                    <span class="text-base-content/40 text-xs block">Claim Amount</span>
                                    <span class="font-bold text-secondary">৳<?= number_format($total, 2) ?></span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <span class="text-base-content/40 text-xs font-semibold uppercase tracking-wider block mb-1">Customer Claim Explanation</span>
                                <p class="text-sm bg-base-300/20 p-3 rounded-xl border border-white/5 text-base-content/85 italic">
                                    "<?= htmlspecialchars($reason) ?>"
                                </p>
                            </div>
                        </div>

                        <!-- Card Actions -->
                        <div class="card-actions justify-end gap-2 mt-4 pt-4 border-t border-white/5">
                            <button class="btn btn-warning btn-sm rounded-xl font-bold px-4" onclick="rejectRefund(<?= htmlspecialchars($product_id) ?>, <?= htmlspecialchars($order_id) ?>)">
                                Put On Hold
                            </button>
                            <button class="btn btn-success btn-sm text-white rounded-xl font-bold px-6" onclick="acceptRefund(<?= htmlspecialchars($product_id) ?>, <?= htmlspecialchars($order_id) ?>)">
                                Approve Refund
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endif; ?>
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

function acceptRefund(productId, orderId) {
    if (!confirm('Are you sure you want to approve this refund request?')) return;

    fetch('../actions/refund_decisionAccept.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId + '&order_id=' + orderId,
    })
    .then(response => {
        if (response.ok) {
            showToast('Refund request approved successfully!', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1200);
        } else {
            showToast('Failed to approve refund request.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Network error processing refund.', 'error');
    });
}

function rejectRefund(productId, orderId) {
    if (!confirm('Are you sure you want to put this refund request on hold?')) return;

    fetch('../actions/refund_decisionReject.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId + '&order_id=' + orderId,
    })
    .then(response => {
        if (response.ok) {
            showToast('Refund request set to On Hold.', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1200);
        } else {
            showToast('Failed to change refund request status.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Network error processing refund.', 'error');
    });
}
</script>

<?php include 'employee_footer.php'; ?>