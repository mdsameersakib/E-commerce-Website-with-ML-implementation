<?php
// Secure session start if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check session role & userid
if (!isset($_SESSION['userid']) || $_SESSION['role'] !== 'employee') {
    header("Location: ../login.php");
    exit();
}

$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en" data-theme="luxury">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Employee Portal - ShopSphere'; ?></title>
    <!-- DaisyUI + Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <li><a href="employee_menu.php?userid=<?php echo $userid; ?>"><i class="fa-solid fa-house text-primary"></i> Home</a></li>
                    <li><a href="employee_warehouse.php?employee=<?php echo $userid; ?>"><i class="fa-solid fa-warehouse text-primary"></i> Warehouse</a></li>
                    <li><a href="employee_supplier.php?employee=<?php echo $userid; ?>"><i class="fa-solid fa-boxes-stacked text-primary"></i> Supplier</a></li>
                    <li><a href="employee_refund.php?employee=<?php echo $userid; ?>"><i class="fa-solid fa-clipboard text-primary"></i> Refund Requests</a></li>
                </ul>
            </div>
            <!-- Brand Logo -->
            <a href="employee_menu.php?userid=<?php echo $userid; ?>" class="btn btn-ghost text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary gap-1 normal-case">
                <i class="fa-solid fa-holly-berry text-primary"></i> ShopSphere
                <span class="badge badge-accent badge-sm font-bold uppercase tracking-wider">Staff</span>
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2 font-medium">
                <li><a href="employee_menu.php?userid=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="employee_warehouse.php?employee=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-warehouse"></i> Warehouse</a></li>
                <li><a href="employee_supplier.php?employee=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-boxes-stacked"></i> Supplier</a></li>
                <li><a href="employee_refund.php?employee=<?php echo $userid; ?>" class="hover:text-primary transition-colors"><i class="fa-solid fa-clipboard"></i> Refund Requests</a></li>
            </ul>
        </div>
        <div class="navbar-end gap-2">
            <!-- User Profile Dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar border border-primary/20 hover:border-primary">
                    <div class="w-10 rounded-full flex items-center justify-center bg-gradient-to-tr from-primary to-secondary text-primary-content">
                        <span class="text-lg font-bold"><?php echo strtoupper(substr($userid, 0, 2)); ?></span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-200 rounded-box w-52 border border-white/5">
                    <li><a href="employee_profile.php?employee=<?php echo $userid; ?>"><i class="fa-solid fa-user text-primary"></i> My Profile</a></li>
                    <div class="divider my-1"></div>
                    <li><a href="../actions/logout.php" class="text-error"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Main Content Container -->
    <main class="flex-grow p-4 md:p-8 max-w-7xl mx-auto w-full">
