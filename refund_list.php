<?php
    $page_title = "ShopSphere - My Refund Requests";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    $customer_id = $_SESSION['userid'] ?? $_GET['customer'] ?? '';

    // Prepare and execute using PDO with corrected JOIN conditions
    $sql_u = "SELECT DISTINCT
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
                  r.customer_id = :customer_id
              ORDER BY r.order_id DESC"; 

    $stmt_u = $conn->prepare($sql_u);
    $stmt_u->execute(['customer_id' => $customer_id]);
    $refunds = $stmt_u->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">Refund Requests</h1>
        <p class="text-sm text-base-content/50 mt-1">Track the status of your submitted product refund claims</p>
    </div>
</div>

<div class="space-y-6 mb-12">
    <?php if (empty($refunds)): ?>
        <div class="card bg-base-200 border border-white/5 shadow-xl p-12 text-center rounded-3xl">
            <div class="text-6xl opacity-20 mb-4"><i class="fa-solid fa-rotate-left"></i></div>
            <h2 class="text-xl font-bold text-base-content/60">No refund requests found</h2>
            <p class="text-sm text-base-content/40 mt-1 mb-8">You haven't requested any refunds yet.</p>
            <a href="orderlist.php?customer=<?= urlencode($customer_id) ?>" class="btn btn-primary border-none hover:opacity-90 transition-all text-white font-bold px-8 shadow-lg">
                View Order History
            </a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 gap-6">
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

                    // Resolve image source safely
                    if (preg_match('/^[a-f0-9]{32}\.(jpg|jpeg|png|webp)$/i', $imageFilename)) {
                        $imageSrc = 'uploads/' . htmlspecialchars($imageFilename);
                    } else {
                        // Safe fallback if it's stored in raw binary or other legacy formats
                        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageFilename);
                    }

                    // Format badge classes based on status
                    $badgeClass = "badge-info";
                    if (strtolower($status) === 'accepted' || strtolower($status) === 'approved') {
                        $badgeClass = "badge-success";
                    } elseif (strtolower($status) === 'rejected') {
                        $badgeClass = "badge-error";
                    } elseif (strtolower($status) === 'processing') {
                        $badgeClass = "badge-warning";
                    }
            ?>
                <!-- Refund Request Card -->
                <div class="card md:card-side bg-base-200 border border-white/5 shadow-xl rounded-3xl overflow-hidden hover:border-white/10 transition-all">
                    <!-- Product Uploaded Image -->
                    <figure class="md:w-64 h-48 md:h-auto bg-base-300 relative overflow-hidden flex-shrink-0">
                        <img src="<?= $imageSrc ?>" alt="<?= htmlspecialchars($product_name) ?>" class="object-cover w-full h-full" />
                    </figure>
                    
                    <!-- Content Details -->
                    <div class="card-body p-6 justify-between">
                        <div>
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                <h2 class="card-title text-lg font-bold text-base-content"><?= htmlspecialchars($product_name) ?></h2>
                                <span class="badge <?= $badgeClass ?> font-semibold py-2.5 px-3"><?= htmlspecialchars($status) ?></span>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm mt-3 bg-base-300/40 p-3 rounded-2xl border border-white/5">
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
                                    <span class="text-base-content/40 text-xs block">Order Total</span>
                                    <span class="font-bold text-secondary">৳<?= number_format($total, 2) ?></span>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <span class="text-base-content/40 text-xs font-semibold uppercase tracking-wider block mb-1">Reason for refund</span>
                                <p class="text-sm bg-base-300/20 p-3 rounded-xl border border-white/5 text-base-content/85 italic">
                                    "<?= htmlspecialchars($reason) ?>"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>