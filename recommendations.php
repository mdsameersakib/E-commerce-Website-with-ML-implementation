<?php
    // Include database connection file
    include 'includes/dbconnect.php';

    // Get customer ID from session (source of truth)
    $customer_id = $_SESSION['userid'] ?? '';

    if (empty($customer_id)) {
        header("Location: login.php");
        exit();
    }

    // 1. Collaborative Filtering SQL query
    $sql_rec = "
        SELECT p.*, COUNT(*) as score
        FROM (
            SELECT product_id FROM wishlist WHERE customer_id = :cid
            UNION
            SELECT product_id FROM adds WHERE customer_id = :cid
        ) as my_products
        JOIN (
            SELECT customer_id, product_id FROM wishlist
            UNION
            SELECT customer_id, product_id FROM adds
        ) as other_user_interactions ON my_products.product_id = other_user_interactions.product_id AND other_user_interactions.customer_id != :cid
        JOIN (
            SELECT customer_id, product_id FROM wishlist
            UNION
            SELECT customer_id, product_id FROM adds
        ) as rec_interactions ON other_user_interactions.customer_id = rec_interactions.customer_id
        JOIN product p ON rec_interactions.product_id = p.product_id
        WHERE rec_interactions.product_id NOT IN (
            SELECT product_id FROM wishlist WHERE customer_id = :cid
            UNION
            SELECT product_id FROM adds WHERE customer_id = :cid
        )
        GROUP BY p.product_id
        ORDER BY score DESC, p.rating DESC
        LIMIT :limit
    ";
    
    $stmt_rec = $conn->prepare($sql_rec);
    $stmt_rec->bindValue(':cid', $customer_id, PDO::PARAM_INT);
    $stmt_rec->bindValue(':limit', 10, PDO::PARAM_INT);
    $stmt_rec->execute();
    $recommendations = $stmt_rec->fetchAll();
    
    // 2. Fallback to top-rated items if we need more recommendations (cold start)
    if (count($recommendations) < 10) {
        $needed = 10 - count($recommendations);
        $exclude_ids = [0];
        
        // Exclude items already bought/wishlisted by this user
        $stmt_exclude = $conn->prepare("
            SELECT product_id FROM wishlist WHERE customer_id = ?
            UNION
            SELECT product_id FROM adds WHERE customer_id = ?
        ");
        $stmt_exclude->execute([$customer_id, $customer_id]);
        $user_items = array_column($stmt_exclude->fetchAll(), 'product_id');
        $exclude_ids = array_unique(array_merge($exclude_ids, $user_items, array_column($recommendations, 'product_id')));
        
        $in_clause = implode(',', array_fill(0, count($exclude_ids), '?'));
        
        $sql_fallback = "
            SELECT * FROM product 
            WHERE product_id NOT IN ($in_clause) 
            ORDER BY rating DESC, stock DESC 
            LIMIT ?
        ";
        
        $stmt_fallback = $conn->prepare($sql_fallback);
        $params = array_merge($exclude_ids, [$needed]);
        $stmt_fallback->execute($params);
        $fallbacks = $stmt_fallback->fetchAll();
        $recommendations = array_merge($recommendations, $fallbacks);
    }

    // Recommendation section
    if(!empty($recommendations)){ // Check if $recommendations is not empty
?>
    <section>
        <h1 class="title2">Recommended Products</h1>
        <div class="container">
            <?php
                foreach($recommendations as $recommendation){
                    // Output recommended product details
                    echo '<div class="card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($recommendation['image']) . '" alt="">';
                    echo '</div>';
                    echo '<div class="caption">';
                    echo '<p class="rate">';
                    echo '<div class="card_info">';
                    echo '<div><span>' . htmlspecialchars($recommendation['rating']) . '</span><i class="fas fa-star"></i></div>';
                    echo '</div>';
                    echo '</p>';
                    echo '<p class="product_name">' . htmlspecialchars($recommendation['Pname']) . '</p>';
                    echo '<p class="price"><b>৳' . htmlspecialchars($recommendation['price']) . '</b></p>';
                    echo '</div>';
                    echo '<form id="addToCartForm" method="get">';
                    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($recommendation['product_id']) . '">';
                    echo '<input type="hidden" name="customer_id" value="' . htmlspecialchars($customer_id) . '">';
                    echo '<button type="button" class="button-5" onclick="addToCart(' . htmlspecialchars($recommendation['product_id']) . ',' . htmlspecialchars($customer_id) . ')">Add to cart</button>';
                    echo '</form>';
                    echo '</div>';
                }
            ?>
        </div>
    </section>
<?php
    } else {
        // If no recommendations found
        echo "<p>No recommended products available.</p>";
    }
?>
