<?php
    $page_title = "ShopSphere - Premium E-Commerce";
    include 'includes/header.php';
    include 'includes/dbconnect.php';

    // Fetch user details
    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id = ?");
    $stmt->execute([$userid]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: login.php");
        exit();
    }
?>

<!-- Hero Section -->
<div class="hero min-h-[40vh] rounded-3xl overflow-hidden bg-gradient-to-br from-base-200 via-base-300 to-base-200 border border-white/5 shadow-2xl mb-12 relative">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="hero-content text-center py-12">
        <div class="max-w-2xl">
            <div class="badge badge-primary gap-1 mb-4 py-3 px-4 font-bold text-sm tracking-wide shadow-md">
                <i class="fa-solid fa-sparkles"></i> Welcome to the Future of Shopping
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">
                Hello, <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary"><?php echo htmlspecialchars($row['Cname']); ?></span>!
            </h1>
            <p class="text-base-content/70 max-w-lg mx-auto text-lg mb-8 leading-relaxed">
                Discover curated collections, top-rated essentials, and experience real-time smart suggestions customized just for you.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#categories-section" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all text-white font-bold px-8 shadow-lg">
                    Browse Categories
                </a>
                <a href="orderlist.php?customer=<?php echo $userid; ?>" class="btn btn-outline btn-secondary font-bold px-8">
                    View Orders
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<section id="categories-section" class="mb-12 scroll-mt-24">
    <div class="flex flex-col md:flex-row justify-between items-baseline mb-8 gap-4 border-b border-white/5 pb-4">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight">Explore Categories</h2>
            <p class="text-sm text-base-content/50 mt-1">Browse our range of meticulously selected collections</p>
        </div>
        <div class="badge badge-outline badge-primary font-semibold py-3 px-4">8 Departments</div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Category Card: Electronics -->
        <a href="categories/category_electronics.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-plug group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-primary transition-colors">Electronics</h3>
                    <p class="text-xs text-base-content/60 mt-1">Smart gadgets, computing, and high-tech appliances.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Accessories -->
        <a href="categories/category_accessories.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-gem group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-secondary transition-colors">Accessories</h3>
                    <p class="text-xs text-base-content/60 mt-1">Stunning jewelry, bags, watches, and modern styling.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Clothes -->
        <a href="categories/category_clothes.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-shirt group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-accent transition-colors">Clothes</h3>
                    <p class="text-xs text-base-content/60 mt-1">Premium fashion wear, footwear, and apparel choices.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Stationery -->
        <a href="categories/category_stationery.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-book-open group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-info transition-colors">Stationery</h3>
                    <p class="text-xs text-base-content/60 mt-1">Premium books, supplies, journals, and organization.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Self Care -->
        <a href="categories/category_selfcare.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-mask group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-success transition-colors">Self Care</h3>
                    <p class="text-xs text-base-content/60 mt-1">Skincare, cosmetics, personal hygiene, and beauty.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Health Care -->
        <a href="categories/category_healthcare.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-kit-medical group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-warning transition-colors">Health Care</h3>
                    <p class="text-xs text-base-content/60 mt-1">Wellness, vitamins, supplements, and physical safety.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Food Items -->
        <a href="categories/category_food.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-utensils group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold group-hover:text-error transition-colors">Food Items</h3>
                    <p class="text-xs text-base-content/60 mt-1">Fresh groceries, beverages, snacks, and delicious treats.</p>
                </div>
            </div>
        </a>

        <!-- Category Card: Household -->
        <a href="categories/category_household.php?userid=<?php echo $userid; ?>" class="group">
            <div class="card bg-base-200 border border-white/5 group-hover:border-primary/30 shadow-xl group-hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                <div class="card-body items-center text-center p-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-primary-content text-3xl flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
                        <i class="fa-solid fa-kitchen-set group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold transition-colors">Household</h3>
                    <p class="text-xs text-base-content/60 mt-1">Kitchen tools, furniture, decor, and cleaning essentials.</p>
                </div>
            </div>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
