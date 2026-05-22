<?php
    $page_title = "Staff Dashboard - ShopSphere";
    include 'employee_header.php';
    include '../includes/dbconnect.php';

    // Fetch employee details
    $stmt = $conn->prepare("SELECT * FROM employee WHERE employee_id = ?");
    $stmt->execute([$userid]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        // Fallback or error redirection if employee not found
        header("Location: ../login.php");
        exit();
    }
?>

<div class="space-y-8 mb-12">
    <!-- Hero / Welcome Section -->
    <div class="hero bg-base-200 border border-white/5 rounded-3xl overflow-hidden shadow-xl p-6 md:p-12">
        <div class="hero-content flex-col lg:flex-row gap-8 w-full justify-between">
            <div class="space-y-4 max-w-xl">
                <span class="badge badge-primary font-bold uppercase tracking-wider">Welcome Back</span>
                <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight">Hello, <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary"><?= htmlspecialchars($employee['Ename']) ?></span>!</h1>
                <p class="text-base-content/60 leading-relaxed text-sm md:text-base">Manage store warehouse inventory, review incoming supply orders, and process customer product refund claims seamlessly from your central dashboard.</p>
                <div class="flex gap-3 pt-2">
                    <span class="badge badge-outline border-white/10 gap-1 text-xs py-3"><i class="fa-solid fa-id-card opacity-50"></i> ID: #<?= htmlspecialchars($employee['employee_id']) ?></span>
                    <span class="badge badge-outline border-white/10 gap-1 text-xs py-3"><i class="fa-solid fa-map-marker-alt opacity-50"></i> Location: <?= htmlspecialchars($employee['address'] ?: 'Global Depot') ?></span>
                </div>
            </div>
            
            <div class="flex-shrink-0">
                <div class="avatar placeholder border border-primary/20 p-2 rounded-full bg-base-300">
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gradient-to-tr from-primary to-secondary text-primary-content text-3xl font-extrabold shadow-lg grid place-items-center">
                        <span class="block leading-none text-center"><?= htmlspecialchars(getInitials($employee['Ename'] ?? '', 'S')) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions / Categories -->
    <div>
        <h2 class="text-xl font-bold tracking-tight mb-6 flex items-center gap-2"><i class="fa-solid fa-grip text-primary"></i> Portal Management</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Warehouse Card -->
            <a href="employee_warehouse.php?employee=<?= urlencode($userid) ?>" class="card bg-base-200 border border-white/5 shadow-xl hover:border-primary/30 hover:shadow-primary/5 transition-all group rounded-3xl overflow-hidden">
                <div class="card-body p-6 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-warehouse"></i>
                    </div>
                    <div>
                        <h3 class="card-title font-extrabold text-lg text-base-content group-hover:text-primary transition-colors">Warehouse Manager</h3>
                        <p class="text-sm text-base-content/50 mt-1">Monitor product stocks, view warehouse distribution, and configure item availability.</p>
                    </div>
                </div>
            </a>

            <!-- Supplier Card -->
            <a href="employee_supplier.php?employee=<?= urlencode($userid) ?>" class="card bg-base-200 border border-white/5 shadow-xl hover:border-secondary/30 hover:shadow-secondary/5 transition-all group rounded-3xl overflow-hidden">
                <div class="card-body p-6 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-secondary/10 text-secondary flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <div>
                        <h3 class="card-title font-extrabold text-lg text-base-content group-hover:text-secondary transition-colors">Supply & Logistics</h3>
                        <p class="text-sm text-base-content/50 mt-1">Review supplier shipments, schedule product restocks, and inspect logs.</p>
                    </div>
                </div>
            </a>

            <!-- Refund Card -->
            <a href="employee_refund.php?employee=<?= urlencode($userid) ?>" class="card bg-base-200 border border-white/5 shadow-xl hover:border-warning/30 hover:shadow-warning/5 transition-all group rounded-3xl overflow-hidden">
                <div class="card-body p-6 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-warning/10 text-warning flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <div>
                        <h3 class="card-title font-extrabold text-lg text-base-content group-hover:text-warning transition-colors">Refund Claims</h3>
                        <p class="text-sm text-base-content/50 mt-1">Review uploaded customer pictures, check justifications, and approve/reject claims.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include 'employee_footer.php'; ?>
