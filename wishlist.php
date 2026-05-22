<?php
    $page_title = "ShopSphere - My Wishlist";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    // Prepare and execute using PDO
    $stmt = $conn->prepare("SELECT c.customer_id, a.product_id, p.Pname, p.price, p.image FROM customer c JOIN wishlist a ON c.customer_id = a.customer_id JOIN product p ON a.product_id = p.product_id WHERE c.customer_id = ?");
    $stmt->execute([$userid]);
    $wishlist_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">My Wishlist</h1>
        <p class="text-sm text-base-content/50 mt-1">Products you saved for later</p>
    </div>
    <div class="badge badge-outline badge-primary font-semibold py-3 px-4"><?= count($wishlist_items) ?> Items Saved</div>
</div>

<div class="bg-base-200 border border-white/5 rounded-3xl p-6 shadow-xl mb-12">
    <?php if (empty($wishlist_items)): ?>
        <div class="text-center py-16">
            <div class="text-6xl opacity-20 mb-4"><i class="fa-solid fa-heart-crack"></i></div>
            <h2 class="text-xl font-bold text-base-content/60">Your wishlist is empty</h2>
            <p class="text-sm text-base-content/40 mt-1 mb-8">Browse the store and click the heart icon on any product to save it here.</p>
            <a href="menu.php?userid=<?= urlencode($userid) ?>" class="btn btn-primary border-none hover:opacity-90 transition-all text-white font-bold px-8 shadow-lg">
                Start Shopping
            </a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="table w-full text-left align-middle">
                <thead>
                    <tr class="border-b border-white/5 text-base-content/75 text-sm">
                        <th class="py-4">Product</th>
                        <th class="py-4">Price</th>
                        <th class="py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wishlist_items as $row_u): ?>
                        <tr class="border-b border-white/5 hover:bg-base-300/40 transition-colors">
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
                                <span class="font-extrabold text-lg text-primary">৳<?= number_format($row_u['price'], 2) ?></span>
                            </td>
                            <td class="py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="btn btn-primary btn-sm border-none hover:opacity-90 text-white font-bold px-4" 
                                            onclick="addToCart(<?= intval($row_u['product_id']) ?>)">
                                        <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                                    </button>
                                    <button class="btn btn-ghost btn-sm text-error hover:bg-error/10 btn-square" 
                                            onclick="removeFromWishlist(<?= intval($row_u['product_id']) ?>)">
                                        <i class="fa-solid fa-trash-can"></i>
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

<script>
function addToCart(productId) {
    const formData = new URLSearchParams();
    formData.append('product_id', productId);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/addtocart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Item added to cart successfully!', 'success');
        } else {
            showNotification('Failed to add item to cart.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to cart: ' + error, 'error');
    });
}

function removeFromWishlist(productId) {
    const formData = new URLSearchParams();
    formData.append('product_id', productId);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('actions/removefromwishlist.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Item removed from wishlist.', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to remove item.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error removing item: ' + error, 'error');
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