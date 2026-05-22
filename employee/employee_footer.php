    </main>

    <!-- Footer -->
    <footer class="footer p-10 bg-base-200 text-base-content border-t border-white/5 mt-auto">
        <aside>
            <div class="flex items-center gap-2 text-2xl font-extrabold text-primary">
                <i class="fa-solid fa-holly-berry"></i> ShopSphere
                <span class="badge badge-accent badge-sm font-bold uppercase tracking-wider">Staff</span>
            </div>
            <p class="mt-2 text-sm text-base-content/60">Modern Staff Portal.<br/>Restyled with pure PHP, PDO, & DaisyUI.</p>
        </aside> 
        <nav>
            <h6 class="footer-title text-primary opacity-80">Inventory Management</h6> 
            <a href="employee_warehouse.php?employee=<?php echo $userid; ?>" class="link link-hover">Warehouse Products</a>
            <a href="employee_supplier.php?employee=<?php echo $userid; ?>" class="link link-hover">Supply Orders</a>
        </nav> 
        <nav>
            <h6 class="footer-title text-secondary opacity-80">Operations</h6> 
            <a href="employee_refund.php?employee=<?php echo $userid; ?>" class="link link-hover">Customer Refund Claims</a>
            <a href="employee_profile.php?employee=<?php echo $userid; ?>" class="link link-hover">My Staff Profile</a>
        </nav>
    </footer>
    <footer class="footer px-10 py-4 border-t bg-base-200 text-base-content border-white/5 flex justify-between items-center">
        <aside class="items-center grid-flow-col">
            <p>&copy; <?php echo date('Y'); ?> ShopSphere. Internal Employee System.</p>
        </aside>
    </footer>
</body>
</html>
