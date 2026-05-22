<?php
// Secure session start if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check session userid as fallback/auth
if (!isset($_SESSION['userid'])) {
    // If not authenticated, redirect to login
    $base_dir = file_exists('includes/dbconnect.php') ? '' : '../';
    header("Location: " . $base_dir . "login.php");
    exit();
}

$userid = $_SESSION['userid'];
$base_dir = file_exists('includes/dbconnect.php') ? '' : '../';

include_once __DIR__ . '/dbconnect.php';

function getInitials($name, $fallback = 'U') {
    $name = trim((string) $name);
    if ($name === '') {
        return $fallback;
    }

    $parts = preg_split('/\s+/', $name);
    if (count($parts) > 1) {
        return strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1));
    }

    return strtoupper(substr($parts[0], 0, 2));
}

$avatar_initials = 'U';
if (isset($conn)) {
    $stmt_avatar = $conn->prepare("SELECT Cname FROM customer WHERE customer_id = ?");
    $stmt_avatar->execute([$userid]);
    $avatar_user = $stmt_avatar->fetch(PDO::FETCH_ASSOC);
    $avatar_initials = getInitials($avatar_user['Cname'] ?? '');
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'E-Commerce Platform'; ?></title>
    <!-- DaisyUI + Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo $base_dir; ?>css/theme.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-base-100 text-base-content flex flex-col">
    <!-- Navbar -->
    <div class="navbar bg-base-200/90 backdrop-blur-md sticky top-0 z-50 px-4 md:px-8 border-b border-white/5 shadow-md">
        <div class="navbar-start">
            <!-- Mobile Menu Dropdown -->
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-200 rounded-box w-52 border border-white/5">
                    <li><a href="<?php echo $base_dir; ?>menu.php?userid=<?php echo $userid; ?>"><i class="fa-solid fa-house text-primary"></i> Home</a></li>
                    <li>
                        <span class="font-bold text-primary-focus"><i class="fa-solid fa-list"></i> Categories</span>
                        <ul class="p-2">
                            <li><a href="<?php echo $base_dir; ?>categories/category_electronics.php?userid=<?php echo $userid; ?>">Electronics</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_accessories.php?userid=<?php echo $userid; ?>">Accessories</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_clothes.php?userid=<?php echo $userid; ?>">Clothes</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_stationery.php?userid=<?php echo $userid; ?>">Stationery</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_selfcare.php?userid=<?php echo $userid; ?>">Self Care</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_healthcare.php?userid=<?php echo $userid; ?>">Health Care</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_food.php?userid=<?php echo $userid; ?>">Food Items</a></li>
                            <li><a href="<?php echo $base_dir; ?>categories/category_household.php?userid=<?php echo $userid; ?>">Household</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $base_dir; ?>refund_list.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-rotate-left text-primary"></i> My Refunds</a></li>
                </ul>
            </div>
            <!-- Brand Logo -->
            <a href="<?php echo $base_dir; ?>menu.php?userid=<?php echo $userid; ?>" class="btn btn-ghost text-2xl font-extrabold text-primary gap-1 normal-case">
                <i class="fa-solid fa-holly-berry"></i> ShopSphere
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2 font-medium">
                <li><a href="<?php echo $base_dir; ?>menu.php?userid=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="hover:text-primary transition-colors flex items-center gap-1"><i class="fa-solid fa-list"></i> Categories <i class="fa-solid fa-chevron-down text-xs opacity-60"></i></div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-xl bg-base-200 rounded-box w-56 border border-white/5 mt-0">
                        <li><a href="<?php echo $base_dir; ?>categories/category_electronics.php?userid=<?php echo $userid; ?>">Electronics</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_accessories.php?userid=<?php echo $userid; ?>">Accessories</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_clothes.php?userid=<?php echo $userid; ?>">Clothes</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_stationery.php?userid=<?php echo $userid; ?>">Stationery</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_selfcare.php?userid=<?php echo $userid; ?>">Self Care</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_healthcare.php?userid=<?php echo $userid; ?>">Health Care</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_food.php?userid=<?php echo $userid; ?>">Food Items</a></li>
                        <li><a href="<?php echo $base_dir; ?>categories/category_household.php?userid=<?php echo $userid; ?>">Household</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $base_dir; ?>refund_list.php?customer=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-rotate-left"></i> Refunds</a></li>
            </ul>
        </div>
        <div class="navbar-end gap-2 md:gap-4">
            <!-- Wishlist Button -->
            <a href="<?php echo $base_dir; ?>wishlist.php?customer=<?php echo $userid; ?>" class="btn btn-ghost btn-circle text-primary hover:bg-base-300 relative" title="Wishlist">
                <i class="fa-solid fa-heart text-xl"></i>
            </a>

            <!-- Cart Button -->
            <a href="<?php echo $base_dir; ?>cart.php?customer=<?php echo $userid; ?>" class="btn btn-ghost btn-circle text-secondary hover:bg-base-300" title="Shopping Cart">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
            </a>

            <!-- User Profile Dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle border border-primary/20 hover:border-primary p-0">
                    <div class="w-10 h-10 rounded-full grid place-items-center bg-primary text-primary-content">
                        <span class="block leading-none text-center text-lg font-bold"><?php echo htmlspecialchars($avatar_initials); ?></span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-200 rounded-box w-52 border border-white/5">
                    <li><a href="<?php echo $base_dir; ?>profile.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-user text-primary"></i> My Profile</a></li>
                    <li><a href="<?php echo $base_dir; ?>orderlist.php?customer=<?php echo $userid; ?>"><i class="fa-solid fa-receipt text-primary"></i> Order History</a></li>
                    <div class="divider my-1"></div>
                    <li><a href="<?php echo $base_dir; ?>actions/logout.php" class="text-error"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Main Content Container -->
    <main class="flex-grow p-4 md:p-8 max-w-7xl mx-auto w-full">
