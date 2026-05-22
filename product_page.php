<?php
    $page_title = "ShopSphere - Product Details";
    include 'includes/header.php';
    include 'includes/dbconnect.php';
    
    $product_id = $_GET['product'] ?? '';
    
    // Fetch product details
    $stmt_p = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt_p->execute([$product_id]);
    $row_p = $stmt_p->fetch();
    
    if (!$row_p) {
        echo "<div class='alert alert-error shadow-lg my-8'>Product not found.</div>";
        include 'includes/footer.php';
        exit();
    }
    
    $pname = $row_p['Pname'];
    $imageData = $row_p['image'];
    
    // Fetch reviews
    $stmt_r = $conn->prepare("
        SELECT review.user_review, customer.Cname
        FROM review
        JOIN customer ON review.customer_id = customer.customer_id
        WHERE review.product_id = ?
    ");
    $stmt_r->execute([$product_id]);
    $reviews = $stmt_r->fetchAll();
?>

<!-- Back to Home -->
<div class="mb-6">
    <a href="menu.php?userid=<?= urlencode($userid) ?>" class="btn btn-ghost btn-sm gap-2">
        <i class="fa-solid fa-arrow-left"></i> Back to Products
    </a>
</div>

<!-- Product Details Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-base-200 border border-white/5 rounded-3xl p-6 md:p-10 shadow-xl mb-12">
    <!-- Product Image -->
    <div class="flex items-center justify-center bg-base-300 rounded-2xl overflow-hidden aspect-square border border-white/5 shadow-inner group">
        <img src="<?= htmlspecialchars($imageData) ?>" alt="<?= htmlspecialchars($pname) ?>" class="object-cover w-full h-full max-h-[500px] group-hover:scale-105 transition-transform duration-500" />
    </div>

    <!-- Product Text & Actions -->
    <div class="flex flex-col justify-between">
        <div>
            <!-- Category and Rating Badges -->
            <div class="flex flex-wrap items-center gap-2 mb-4">
                <span class="badge badge-primary font-semibold py-2 px-3"><?= htmlspecialchars($row_p['category']) ?></span>
                <span class="badge badge-neutral bg-base-300 border-none font-semibold py-2 px-3 text-warning gap-1">
                    <i class="fa-solid fa-star"></i> <?= htmlspecialchars($row_p['rating']) ?> / 5
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl font-extrabold mb-4"><?= htmlspecialchars($pname) ?></h1>

            <!-- Price with potential discount -->
            <div class="mb-6">
                <?php 
                $discount_stmt = $conn->prepare("SELECT * FROM discount WHERE product_id = ?");
                $discount_stmt->execute([$product_id]);
                $discount_row = $discount_stmt->fetch();
                if ($discount_row): 
                    $discount_value = $discount_row['percentage'];
                    $new_price = $row_p['price'] - ($row_p['price'] * ($discount_value / 100));               
                ?>
                    <div class="flex items-baseline gap-3">
                        <span class="text-3xl font-black text-error">৳<?= number_format($new_price, 2) ?></span>
                        <span class="text-lg line-through opacity-50">৳<?= number_format($row_p['price'], 2) ?></span>
                        <span class="badge badge-error font-extrabold text-xs py-2 px-3"><?= htmlspecialchars($discount_value) ?>% OFF</span>
                    </div>
                <?php else: 
                    $new_price = $row_p['price'];
                ?>
                    <span class="text-3xl font-black text-primary">৳<?= number_format($new_price, 2) ?></span>
                <?php endif; ?>
            </div>

            <!-- Description -->
            <div class="prose prose-sm text-base-content/75 mb-6 max-w-none">
                <h3 class="font-bold text-base-content text-lg mb-2">Description</h3>
                <p class="leading-relaxed"><?= htmlspecialchars($row_p['review']) ?></p>
            </div>

            <!-- Hidden tags for Javascript access -->
            <div hidden id="cus"><?= htmlspecialchars($userid) ?></div>
            <div hidden id="prod"><?= htmlspecialchars($product_id) ?></div>
        </div>

        <!-- Call to Action -->
        <div class="border-t border-white/5 pt-6 mt-6">
            <?php if ($row_p['stock'] == 0): ?>
                <button type="button" class="btn btn-disabled btn-block" disabled>Out of Stock</button>
            <?php else: ?>
                <div class="flex gap-4">
                    <button type="button" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white flex-grow font-bold shadow-lg" 
                            onclick="addToCart(<?= intval($product_id) ?>)">
                        <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                    </button>
                    <button type="button" class="btn btn-outline btn-secondary" 
                            onclick="addToWishlist(<?= intval($product_id) ?>)">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Interactive Review/Rating and Others' Reviews -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
    <!-- Write a Review -->
    <div class="lg:col-span-1 bg-base-200 border border-white/5 rounded-3xl p-6 shadow-xl flex flex-col justify-between">
        <div>
            <h2 class="text-xl font-bold mb-4">Rate & Review</h2>
            
            <!-- Dynamic Star Selection -->
            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Select Rating</span></label>
                <div class="rating rating-md gap-1">
                    <input type="radio" name="rating-star" class="mask mask-star-2 bg-orange-400" onclick="give_rating(1)" />
                    <input type="radio" name="rating-star" class="mask mask-star-2 bg-orange-400" onclick="give_rating(2)" />
                    <input type="radio" name="rating-star" class="mask mask-star-2 bg-orange-400" onclick="give_rating(3)" />
                    <input type="radio" name="rating-star" class="mask mask-star-2 bg-orange-400" onclick="give_rating(4)" />
                    <input type="radio" name="rating-star" class="mask mask-star-2 bg-orange-400" onclick="give_rating(5)" checked />
                </div>
            </div>

            <!-- Review Text -->
            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Your Review</span></label>
                <textarea id="review_text" class="textarea textarea-bordered h-24 focus:outline-none focus:border-primary" placeholder="Tell others what you think of this product..."></textarea>
            </div>
        </div>

        <button type="button" class="btn btn-secondary btn-block font-bold mt-2" onclick="submitReview()">
            Submit Review
        </button>
    </div>

    <!-- Others' Reviews -->
    <div class="lg:col-span-2 bg-base-200 border border-white/5 rounded-3xl p-6 shadow-xl">
        <h2 class="text-xl font-bold mb-4 border-b border-white/5 pb-2">Customer Reviews (<?= count($reviews) ?>)</h2>
        <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2">
            <?php if (empty($reviews)): ?>
                <div class="text-center py-12">
                    <span class="text-4xl opacity-35"><i class="fa-regular fa-comment-dots"></i></span>
                    <p class="text-base-content/50 mt-2 text-sm">No reviews yet. Be the first to share your thoughts!</p>
                </div>
            <?php else: ?>
                <?php foreach ($reviews as $row_r): ?>
                    <div class="bg-base-300/50 p-4 rounded-2xl border border-white/5">
                        <div class="flex items-center gap-2 mb-1.5">
                            <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-xs">
                                <?= strtoupper(substr($row_r['Cname'], 0, 2)) ?>
                            </div>
                            <span class="font-bold text-sm text-base-content"><?= htmlspecialchars($row_r['Cname']) ?></span>
                            <span class="badge badge-ghost badge-sm opacity-60">Verified Purchase</span>
                        </div>
                        <p class="text-sm text-base-content/85 leading-relaxed"><?= htmlspecialchars($row_r['user_review']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Recommendations section -->
<?php
    // Collaborative filtering SQL query
    $sql_rec = "
        SELECT p.*, COUNT(*) as co_occurrence
        FROM (
            SELECT customer_id FROM wishlist WHERE product_id = :pid
            UNION
            SELECT customer_id FROM adds WHERE product_id = :pid
        ) as users_with_this_item
        JOIN (
            SELECT customer_id, product_id FROM wishlist WHERE product_id != :pid
            UNION
            SELECT customer_id, product_id FROM adds WHERE product_id != :pid
        ) as other_items ON users_with_this_item.customer_id = other_items.customer_id
        JOIN product p ON other_items.product_id = p.product_id
        WHERE p.category = :category
        GROUP BY p.product_id
        ORDER BY co_occurrence DESC, p.rating DESC
        LIMIT 4
    ";
    
    $stmt_rec = $conn->prepare($sql_rec);
    $stmt_rec->bindValue(':pid', $product_id, PDO::PARAM_INT);
    $stmt_rec->bindValue(':category', $row_p['category'], PDO::PARAM_STR);
    $stmt_rec->execute();
    $recommendations = $stmt_rec->fetchAll();
    
    // Fill up the recommendation list if it's less than 4 items
    if (count($recommendations) < 4) {
        $needed = 4 - count($recommendations);
        $exclude_ids = array_merge([$product_id], array_column($recommendations, 'product_id'));
        $in_clause = implode(',', array_fill(0, count($exclude_ids), '?'));
        
        $sql_fallback = "
            SELECT * FROM product 
            WHERE category = ? AND product_id NOT IN ($in_clause) 
            ORDER BY rating DESC, stock DESC 
            LIMIT ?
        ";
        
        $stmt_fallback = $conn->prepare($sql_fallback);
        $params = array_merge([$row_p['category']], $exclude_ids, [$needed]);
        $stmt_fallback->execute($params);
        $fallbacks = $stmt_fallback->fetchAll();
        $recommendations = array_merge($recommendations, $fallbacks);
    }
?>

<section class="mb-12">
    <div class="flex flex-col md:flex-row justify-between items-baseline mb-6 gap-4 border-b border-white/5 pb-3">
        <div>
            <h2 class="text-2xl font-extrabold tracking-tight">Products You May Also Like</h2>
            <p class="text-xs text-base-content/50 mt-1">Based on interactions from users interested in this item</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($recommendations as $row_rec): ?>
            <div class="card bg-base-200 border border-white/5 hover:border-primary/20 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Product Image -->
                    <div class="relative overflow-hidden aspect-square bg-base-300 rounded-t-2xl flex items-center justify-center">
                        <a href="product_page.php?customer=<?= urlencode($userid) ?>&product=<?= urlencode($row_rec['product_id']) ?>" class="w-full h-full flex items-center justify-center">
                            <img src="<?= htmlspecialchars($row_rec['image']) ?>" alt="<?= htmlspecialchars($row_rec['Pname']) ?>" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" />
                        </a>
                        <div class="absolute top-3 left-3 bg-base-900/80 backdrop-blur-md px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-md border border-white/5">
                            <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                            <span><?= htmlspecialchars($row_rec['rating']) ?></span>
                        </div>
                        <button class="absolute top-3 right-3 btn btn-circle btn-sm btn-ghost bg-base-900/80 backdrop-blur-md border border-white/5 hover:bg-primary hover:text-white transition-colors shadow-md" 
                                onclick="addToWishlist(<?= intval($row_rec['product_id']) ?>)">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </div>

                    <!-- Product Details -->
                    <div class="p-5">
                        <?php 
                        $rec_pid = $row_rec['product_id'];
                        $rec_discount_stmt = $conn->prepare("SELECT * FROM discount WHERE product_id = ?");
                        $rec_discount_stmt->execute([$rec_pid]);
                        $rec_discount_row = $rec_discount_stmt->fetch();
                        if ($rec_discount_row): 
                            $discount_value = $rec_discount_row['percentage'];
                            $new_price = $row_rec['price'] - ($row_rec['price'] * ($discount_value / 100));               
                        ?>
                            <div class="badge badge-error gap-1 mb-2 text-xs font-bold py-2 px-2.5">
                                <i class="fa-solid fa-tag"></i> <?= htmlspecialchars($discount_value) ?>% OFF
                            </div>
                            <h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors line-clamp-1"><?= htmlspecialchars($row_rec['Pname']) ?></h3>
                            <div class="flex items-baseline gap-2 mt-2">
                                <span class="text-xl font-extrabold text-error">৳<?= number_format($new_price, 2) ?></span>
                                <span class="text-sm line-through opacity-50">৳<?= number_format($row_rec['price'], 2) ?></span>
                            </div>
                        <?php else: 
                            $new_price = $row_rec['price'];
                        ?>
                            <div class="h-6"></div>
                            <h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors line-clamp-1"><?= htmlspecialchars($row_rec['Pname']) ?></h3>
                            <div class="flex items-baseline mt-2">
                                <span class="text-xl font-extrabold text-primary">৳<?= number_format($new_price, 2) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Action Footer -->
                <div class="p-5 pt-0">
                    <?php if ($row_rec['stock'] == 0): ?>
                        <button type="button" class="btn btn-disabled btn-block btn-sm text-xs font-bold" disabled>Out of Stock</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white btn-block btn-sm font-bold shadow-md" 
                                onclick="addToCart(<?= intval($row_rec['product_id']) ?>)">
                            <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

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
            showNotification('Added to cart successfully!', 'success');
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

    fetch('actions/addtowishlist.php', {
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

function give_rating(rating) {
    const formData = new URLSearchParams();
    formData.append('product_id', '<?= $product_id ?>');
    formData.append('rating', rating);

    fetch('actions/give_rating.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Rating submitted successfully!', 'success');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to submit rating.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error submitting rating: ' + error, 'error');
    });
}

function submitReview() {
    const reviewText = document.getElementById('review_text').value.trim();
    if (!reviewText) {
        showNotification('Please enter a review first.', 'error');
        return;
    }

    const formData = new URLSearchParams();
    formData.append('product_id', '<?= $product_id ?>');
    formData.append('customer_id', '<?= $userid ?>');
    formData.append('review', reviewText);

    fetch('actions/give_review.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString()
    })
    .then(response => {
        if (response.ok) {
            showNotification('Review submitted successfully!', 'success');
            document.getElementById('review_text').value = '';
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Failed to submit review.', 'error');
        }
    })
    .catch(error => {
        showNotification('Error submitting review: ' + error, 'error');
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
