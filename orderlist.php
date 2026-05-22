<?php
    $page_title = "ShopSphere - Order History";
    include 'includes/header.php';
    include 'includes/dbconnect.php';
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">Order History</h1>
        <p class="text-sm text-base-content/50 mt-1">View your past purchases and request refunds</p>
    </div>
</div>

<div class="space-y-6 mb-12">
    <?php
        $stmt_orders = $conn->prepare("SELECT DISTINCT order_id FROM adds WHERE customer_id = ? AND order_id <> 0 ORDER BY order_id DESC");
        $stmt_orders->execute([$userid]);
        $orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);

        if (empty($orders)):
    ?>
        <div class="card bg-base-200 border border-white/5 shadow-xl p-12 text-center rounded-3xl">
            <div class="text-6xl opacity-20 mb-4"><i class="fa-solid fa-receipt"></i></div>
            <h2 class="text-xl font-bold text-base-content/60">No orders found</h2>
            <p class="text-sm text-base-content/40 mt-1 mb-8">You haven't placed any orders yet.</p>
            <a href="menu.php?userid=<?= urlencode($userid) ?>" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white font-bold px-8 shadow-lg">
                Shop Now
            </a>
        </div>
    <?php 
        else:
            $stmt_products = $conn->prepare("SELECT a.*, p.Pname, p.price, p.image FROM adds AS a JOIN product AS p ON a.product_id = p.product_id WHERE a.order_id = ?");
            $stmt_refund = $conn->prepare("SELECT COUNT(*) as cnt FROM refund WHERE product_id = ? AND order_id = ?");

            // Iterate through orders
            foreach ($orders as $index => $order_row):
                $order_id = $order_row['order_id'];
                $stmt_products->execute([$order_id]);
                $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);
                
                // Get order total price from orders table if available, else sum products
                $stmt_total = $conn->prepare("SELECT total_price FROM orders WHERE order_id = ?");
                $stmt_total->execute([$order_id]);
                $order_meta = $stmt_total->fetch();
                $order_total = $order_meta ? $order_meta['total_price'] : array_sum(array_map(function($p) { return $p['price'] * $p['quantity']; }, $products));
    ?>
        <!-- Order Accordion Card -->
        <div class="collapse collapse-arrow bg-base-200 border border-white/5 rounded-3xl shadow-lg">
            <input type="checkbox" class="peer" <?= $index === 0 ? 'checked' : '' ?> /> 
            <div class="collapse-title flex flex-wrap justify-between items-center pr-12 py-5 font-bold gap-4">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-lg"><i class="fa-solid fa-box"></i></span>
                    <div>
                        <span class="text-lg text-base-content block">Order #<?= htmlspecialchars($order_id) ?></span>
                        <span class="text-xs text-base-content/50 font-normal"><?= count($products) ?> items</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="badge badge-success font-semibold py-2 px-3">Completed</span>
                    <span class="text-xl font-black text-secondary">৳<?= number_format($order_total, 2) ?></span>
                </div>
            </div>
            
            <div class="collapse-content px-6 pb-6">
                <div class="divider mt-0 mb-4"></div>
                <div class="overflow-x-auto">
                    <table class="table w-full text-left align-middle">
                        <thead>
                            <tr class="border-b border-white/5 text-base-content/60 text-xs">
                                <th class="py-2.5">Item</th>
                                <th class="py-2.5">Quantity</th>
                                <th class="py-2.5">Unit Price</th>
                                <th class="py-2.5 text-right">Refund Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($products as $product_row):
                                    $stmt_refund->execute([$product_row['product_id'], $order_id]);
                                    $refund_row = $stmt_refund->fetch(PDO::FETCH_ASSOC);
                                    $total_rows = $refund_row['cnt'] ?? 0;
                            ?>
                                <tr class="border-b border-white/5 last:border-0 hover:bg-base-300/30 transition-colors">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-base-300 overflow-hidden border border-white/5">
                                                <img src="<?= htmlspecialchars($product_row['image']) ?>" alt="<?= htmlspecialchars($product_row['Pname']) ?>" class="object-cover w-full h-full" />
                                            </div>
                                            <div>
                                                <span class="font-bold text-sm text-base-content block"><?= htmlspecialchars($product_row['Pname']) ?></span>
                                                <span class="text-xs opacity-50">ID: #<?= htmlspecialchars($product_row['product_id']) ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 font-semibold text-sm"><?= htmlspecialchars($product_row['quantity']) ?></td>
                                    <td class="py-3 font-semibold text-sm">৳<?= number_format($product_row['price'], 2) ?></td>
                                    <td class="py-3 text-right">
                                        <?php if ($total_rows == 0): ?>
                                            <button class="btn btn-outline btn-warning btn-sm font-bold text-xs" 
                                                    onclick="redirectToRefund('<?= addslashes($product_row['Pname']) ?>', <?= intval($product_row['product_id']) ?>, <?= intval($order_id) ?>)">
                                                Request Refund
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-disabled btn-sm text-xs font-bold" disabled>Refunded</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php 
            endforeach;
        endif; 
    ?>
</div>

<div hidden id="cus"><?= htmlspecialchars($userid) ?></div>

<script>
function redirectToRefund(productName, productId, orderId) {
    const customerId = document.getElementById("cus").innerText;
    window.location.href = `Refund.php?customer=${encodeURIComponent(customerId)}&product_name=${encodeURIComponent(productName)}&product_id=${productId}&order_id=${orderId}`;
}
</script>

<?php include 'includes/footer.php'; ?>
