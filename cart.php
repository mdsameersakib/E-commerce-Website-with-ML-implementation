<?php
    $page_title = "ShopSphere - Shopping Cart";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    // Prepare and execute using PDO (selecting quantity as well)
    $stmt = $conn->prepare("SELECT c.customer_id, a.product_id, a.quantity, p.Pname, p.price, p.image FROM customer c JOIN adds a ON c.customer_id = a.customer_id JOIN product p ON a.product_id = p.product_id WHERE c.customer_id = ? AND a.order_id='0'");
    $stmt->execute([$userid]);
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare discount statement
    $stmt_d = $conn->prepare("SELECT percentage FROM discount WHERE product_id = ?");
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">Shopping Cart</h1>
        <p class="text-sm text-base-content/50 mt-1">Review your selected items and check out</p>
    </div>
    <div class="badge badge-outline badge-secondary font-semibold py-3 px-4"><?= count($cart_items) ?> Products</div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
    <!-- Cart Items Table -->
    <div class="lg:col-span-2 bg-base-200 border border-white/5 rounded-3xl p-6 shadow-xl h-fit">
        <?php if (empty($cart_items)): ?>
            <div class="text-center py-16">
                <div class="text-6xl opacity-20 mb-4"><i class="fa-solid fa-cart-shopping"></i></div>
                <h2 class="text-xl font-bold text-base-content/60">Your cart is empty</h2>
                <p class="text-sm text-base-content/40 mt-1 mb-8">Browse our collections and add products to your cart.</p>
                <a href="menu.php?userid=<?= urlencode($userid) ?>" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white font-bold px-8 shadow-lg">
                    Go to Store
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="table w-full text-left align-middle">
                    <thead>
                        <tr class="border-b border-white/5 text-base-content/75 text-sm">
                            <th class="py-4">Product</th>
                            <th class="py-4">Quantity</th>
                            <th class="py-4">Unit Price</th>
                            <th class="py-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalPrice = 0;
                        foreach ($cart_items as $row_u): 
                            $productId = $row_u['product_id'];
                            $quantity = $row_u['quantity'] > 0 ? intval($row_u['quantity']) : 1;
                            
                            $stmt_d->execute([$productId]);
                            $discount_row = $stmt_d->fetch(PDO::FETCH_ASSOC);
                            if ($discount_row) {
                                $discount_value = $discount_row['percentage'];
                                $new_price = $row_u['price'] - ($row_u['price'] * ($discount_value / 100));
                            } else {
                                $new_price = $row_u['price'];
                            }
                            $row_total = $new_price * $quantity;
                            $totalPrice += $row_total;
                        ?>
                            <tr class="border-b border-white/5 hover:bg-base-300/40 transition-colors cart-item-row" data-product-id="<?= $productId ?>">
                                <td class="py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="avatar">
                                            <div class="w-16 h-16 rounded-xl bg-base-300 flex items-center justify-center overflow-hidden border border-white/5">
                                                <img src="<?= htmlspecialchars($row_u['image']) ?>" alt="<?= htmlspecialchars($row_u['Pname']) ?>" class="object-cover" />
                                            </div>
                                        </div>
                                        <div>
                                            <a href="product_page.php?customer=<?= urlencode($userid) ?>&product=<?= urlencode($row_u['product_id']) ?>" 
                                               class="font-bold text-lg hover:text-primary transition-colors line-clamp-1">
                                                <?= htmlspecialchars($row_u['Pname']) ?>
                                            </a>
                                            <span class="badge badge-sm badge-ghost opacity-65 mt-1">ID: #<?= str_pad($row_u['product_id'], 4, '0', STR_PAD_LEFT) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <input type="number" 
                                           value="<?= $quantity ?>" 
                                           min="1" 
                                           max="20" 
                                           class="input input-bordered input-sm w-20 focus:outline-none focus:border-primary font-bold quantity-input" 
                                           onchange="updateQuantity(this.value, <?= $productId ?>, <?= $new_price ?>)" />
                                </td>
                                <td class="py-4">
                                    <span class="font-bold text-base-content/80">৳<?= number_format($new_price, 2) ?></span>
                                </td>
                                <td class="py-4 font-extrabold text-primary">
                                    ৳<span class="row-total-val" id="row-total-<?= $productId ?>"><?= number_format($row_total, 2) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Order Summary Card -->
    <?php if (!empty($cart_items)): ?>
        <div class="lg:col-span-1">
            <div class="card bg-base-200 border border-white/5 shadow-xl p-6 rounded-3xl">
                <h2 class="card-title text-xl font-bold mb-4 border-b border-white/5 pb-2">Order Summary</h2>
                
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-sm opacity-70">
                        <span>Items Count</span>
                        <span><?= count($cart_items) ?> products</span>
                    </div>
                    <div class="flex justify-between text-sm opacity-70">
                        <span>Shipping</span>
                        <span class="text-success font-semibold">Free Delivery</span>
                    </div>
                    <div class="divider my-1"></div>
                    <div class="flex justify-between items-baseline">
                        <span class="font-bold text-lg">Total Cost</span>
                        <span class="text-2xl font-black text-secondary">৳<span id="overall-total-val"><?= number_format($totalPrice, 2) ?></span></span>
                    </div>
                </div>

                <form method="post" class="space-y-3">
                    <button type="submit" name="confirm_order" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white btn-block font-bold shadow-lg">
                        Confirm Purchase
                    </button>
                    <button type="button" class="btn btn-outline btn-error btn-block font-bold" onclick="clearCart()">
                        Clear Cart
                    </button>
                </form>

                <?php
                if (isset($_POST['confirm_order'])) {
                    try {
                        $conn->beginTransaction();

                        // Recalculate true total price from database
                        $stmt_calc = $conn->prepare("
                            SELECT a.quantity, p.price, p.product_id 
                            FROM adds a 
                            JOIN product p ON a.product_id = p.product_id 
                            WHERE a.customer_id = ? AND a.order_id = '0'
                        ");
                        $stmt_calc->execute([$userid]);
                        $calc_items = $stmt_calc->fetchAll();
                        
                        $finalTotalPrice = 0;
                        foreach ($calc_items as $item) {
                            $rec_pid = $item['product_id'];
                            $discount_stmt = $conn->prepare("SELECT percentage FROM discount WHERE product_id = ?");
                            $discount_stmt->execute([$rec_pid]);
                            $discount_row = $discount_stmt->fetch();
                            if ($discount_row) {
                                $item_price = $item['price'] - ($item['price'] * ($discount_row['percentage'] / 100));
                            } else {
                                $item_price = $item['price'];
                            }
                            $finalTotalPrice += $item_price * $item['quantity'];
                        }

                        if ($finalTotalPrice <= 0) {
                            throw new Exception("Cart is empty.");
                        }

                        // Generate unique order ID
                        $check_order_stmt = $conn->prepare("SELECT order_id FROM orders WHERE order_id = ?");
                        do {
                            $order_id = rand(100, 999);
                            $check_order_stmt->execute([$order_id]);
                            $num_rows = $check_order_stmt->rowCount();
                        } while ($num_rows > 0);

                        // Link cart entries to order ID
                        $update_adds_stmt = $conn->prepare("UPDATE adds SET order_id = ? WHERE customer_id = ? AND order_id='0'");
                        $update_adds_stmt->execute([$order_id, $userid]);

                        // Record order
                        $insert_order_stmt = $conn->prepare("INSERT INTO orders (order_id, total_price) VALUES (?, ?)");
                        $insert_order_stmt->execute([$order_id, $finalTotalPrice]);

                        $conn->commit();
                        
                        echo '<div class="alert alert-success mt-4 shadow-md font-semibold flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>Order confirmed successfully! ID: #' . htmlspecialchars($order_id) . '</span>
                              </div>';
                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "menu.php?userid=' . urlencode($userid) . '";
                                }, 2000);
                              </script>';
                    } catch (Exception $e) {
                        if ($conn->inTransaction()) {
                            $conn->rollBack();
                        }
                        echo '<div class="alert alert-error mt-4 shadow-md font-semibold">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function updateQuantity(qty, productId, unitPrice) {
    const quantity = parseInt(qty);
    if (isNaN(quantity) || quantity <= 0) {
        showNotification('Please enter a valid quantity.', 'error');
        return;
    }

    const formData = new URLSearchParams();
    formData.append('product_id', productId);
    formData.append('customer_id', '<?= $userid ?>');
    formData.append('quantity', quantity);

    // Save to database
    fetch('actions/update_cart_quantity.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            // Update row total
            const rowTotal = quantity * unitPrice;
            document.getElementById('row-total-' + productId).innerText = rowTotal.toFixed(2);
            
            // Recalculate overall total
            recalculateOverallTotal();
            showNotification('Quantity updated.', 'success');
        } else {
            showNotification('Failed to update quantity.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error, 'error');
    });
}

function recalculateOverallTotal() {
    let total = 0;
    const totals = document.querySelectorAll('.row-total-val');
    totals.forEach(el => {
        total += parseFloat(el.innerText);
    });
    document.getElementById('overall-total-val').innerText = total.toFixed(2);
}

function clearCart() {
    const formData = new URLSearchParams();
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/removefromcart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Cart cleared successfully.', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to clear cart.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error clearing cart: ' + error, 'error');
    });
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