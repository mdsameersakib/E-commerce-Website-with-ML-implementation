<?php
    // Include database connection file
    include 'dbconnect.php';

    // Fetch user ID from URL parameter
    $customer_id = 00056;

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_shop";
    
    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($connection === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Fetch wishlist data from MySQL
    $sql_wishlist = "SELECT product_id FROM wishlist WHERE customer_id='$customer_id'";
    $result_wishlist = mysqli_query($connection, $sql_wishlist);
    $wishlist_data = mysqli_fetch_all($result_wishlist);

    // Fetch orders data from MySQL
    $sql_orders = "SELECT product_id FROM adds WHERE customer_id='$customer_id'";
    $result_orders = mysqli_query($connection, $sql_orders);
    $orders_data = mysqli_fetch_all($result_orders);

    // Close database connection
    mysqli_close($connection);

    // Prepare data for Surprise library
    $data = [];
    foreach($wishlist_data as $row){
        $data[] = array(strval($customer_id), strval($row[0]), 1);  // 1 indicates interaction
    }
    foreach($orders_data as $row){
        $data[] = array(strval($customer_id), strval($row[0]), 1);  // 1 indicates interaction
    }

    // Split dataset into train and test sets
    $trainset = $data;
    $testset = [];

    // Train the model (you may need to train the model in a separate Python script and store it in a file)
    // Once trained, you can load the pre-trained model here

    // Generate recommendations for a specific user
    function generate_recommendations($customer_id, $n=10){
        // Call Python script to generate recommendations
        $command = escapeshellcmd("python generate_recommendations.py " . $customer_id);
        $output = shell_exec($command);
        $recommendations = json_decode($output, true);
        return $recommendations;
    }

    // Generate recommendations for the user
    $recommendations = generate_recommendations($customer_id);

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
                    echo '<img src="' . $recommendation['image'] . '" alt="">';
                    echo '</div>';
                    echo '<div class="caption">';
                    echo '<p class="rate">';
                    echo '<div class="card_info">';
                    echo '<div><span>' . $recommendation['rating'] . '</span><i class="fas fa-star"></i></div>';
                    echo '</div>';
                    echo '</p>';
                    echo '<p class="product_name">' . $recommendation['Pname'] . '</p>';
                    echo '<p class="price"><b>৳' . $recommendation['price'] . '</b></p>';
                    echo '</div>';
                    echo '<form id="addToCartForm" method="get">';
                    echo '<input type="hidden" name="product_id" value="' . $recommendation['product_id'] . '">';
                    echo '<input type="hidden" name="customer_id" value="' . $customer_id . '">';
                    echo '<button type="button" class="button-5" onclick="addToCart(' . $recommendation['product_id'] . ',' . $customer_id . ')">Add to cart</button>';
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
