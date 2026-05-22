<?php
    $page_title = "ShopSphere - Food Items";
    include '../includes/header.php';
    include '../includes/dbconnect.php';

    $stmt_u = $conn->prepare("SELECT * FROM product WHERE category = ?");
    $stmt_u->execute(['Food Items']);
    $products = $stmt_u->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">Food Items</h1>
        <p class="text-sm text-base-content/50 mt-1">Browse premium products in our Food Items department</p>
    </div>
    <div class="badge badge-outline badge-primary font-semibold py-3 px-4"><?= count($products) ?> Products Available</div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <?php if (empty($products)): ?>
        <div class="col-span-full py-16 text-center">
            <div class="text-5xl opacity-30 mb-4"><i class="fa-solid fa-box-open"></i></div>
            <h2 class="text-xl font-bold text-base-content/60">No products found in this category</h2>
        </div>
    <?php else: ?>
        <?php foreach ($products as $row): ?>
            <div class="card bg-base-200 border border-white/5 hover:border-primary/20 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Product Image -->
                    <div class="relative overflow-hidden aspect-square bg-base-300 rounded-t-2xl flex items-center justify-center">
                        <a href="../product_page.php?customer=<?= urlencode($userid) ?>&product=<?= urlencode($row['product_id']) ?>" class="w-full h-full flex items-center justify-center">
                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['Pname']) ?>" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" />
                        </a>
                        <!-- Rating and Wishlist Overlay -->
                        <div class="absolute top-3 left-3 bg-base-900/80 backdrop-blur-md px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-md border border-white/5">
                            <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                            <span><?= htmlspecialchars($row['rating']) ?></span>
                        </div>
                        <button class="absolute top-3 right-3 btn btn-circle btn-sm btn-ghost bg-base-900/80 backdrop-blur-md border border-white/5 hover:bg-primary hover:text-white transition-colors shadow-md" 
                                onclick="addToWishlist(<?= intval($row['product_id']) ?>)">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </div>

                    <!-- Product Details -->
                    <div class="p-5">
                        <?php 
                        $product_id = $row['product_id'];
                        $discount_query = "SELECT * FROM discount WHERE product_id = ?";
                        $stmt_d = $conn->prepare($discount_query);
                        $stmt_d->execute([$product_id]);
                        $discount_row = $stmt_d->fetch(PDO::FETCH_ASSOC);
                        if ($discount_row): 
                            $discount_value = $discount_row['percentage'];
                            $new_price = $row['price'] - ($row['price'] * ($discount_value / 100));               
                        ?>
                            <div class="badge badge-error gap-1 mb-2 text-xs font-bold py-2 px-2.5">
                                <i class="fa-solid fa-tag"></i> <?= htmlspecialchars($discount_value) ?>% OFF
                            </div>
                            <h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors line-clamp-1"><?= htmlspecialchars($row['Pname']) ?></h3>
                            <div class="flex items-baseline gap-2 mt-2">
                                <span class="text-xl font-extrabold text-error">৳<?= number_format($new_price, 2) ?></span>
                                <span class="text-sm line-through opacity-50">৳<?= number_format($row['price'], 2) ?></span>
                            </div>
                        <?php else: 
                            $new_price = $row['price'];
                        ?>
                            <div class="h-6"></div> <!-- Spacer to align text -->
                            <h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors line-clamp-1"><?= htmlspecialchars($row['Pname']) ?></h3>
                            <div class="flex items-baseline mt-2">
                                <span class="text-xl font-extrabold text-primary">৳<?= number_format($new_price, 2) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Action Footer -->
                <div class="p-5 pt-0">
                    <?php if ($row['stock'] == 0): ?>
                        <button type="button" class="btn btn-disabled btn-block btn-sm text-xs font-bold" disabled>Out of Stock</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white btn-block btn-sm font-bold shadow-md" 
                                onclick="addToCart(<?= intval($row['product_id']) ?>)">
                            <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
function addToCart(productId) {
    const formData = new URLSearchParams();
    formData.append('product_id', productId);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('../actions/addtocart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Successfully added to cart!', 'success');
        } else {
            showNotification('Failed to add to cart.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to cart: ' + error, 'error');
    });
}

function addToWishlist(productId) {
    const formData = new URLSearchParams();
    formData.append('product_id', productId);
    formData.append('customer_id', '<?= $userid ?>');

    fetch('../actions/addtowishlist.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Added to wishlist successfully!', 'success');
        } else {
            showNotification('Failed to add to wishlist.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to wishlist: ' + error, 'error');
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

<?php include '../includes/footer.php'; ?>
