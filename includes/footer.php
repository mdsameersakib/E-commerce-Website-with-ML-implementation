    </main>

    <!-- Footer -->
    <footer class="footer p-10 bg-base-200 text-base-content border-t border-white/5 mt-auto">
        <aside>
            <div class="flex items-center gap-2 text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">
                <i class="fa-solid fa-holly-berry text-primary"></i> ShopSphere
            </div>
            <p class="mt-2 text-sm text-base-content/60">Modern University E-Commerce Project.<br/>Restyled with pure PHP, PDO, & DaisyUI.</p>
        </aside> 
        <nav>
            <h6 class="footer-title text-primary opacity-80">Marketplace</h6> 
            <a href="<?php echo $base_dir; ?>menu.php?userid=<?php echo $userid; ?>" class="link link-hover">Home Menu</a>
            <a href="<?php echo $base_dir; ?>orderlist.php?customer=<?php echo $userid; ?>" class="link link-hover">Order List</a>
            <a href="<?php echo $base_dir; ?>wishlist.php?customer=<?php echo $userid; ?>" class="link link-hover">My Wishlist</a>
        </nav> 
        <nav>
            <h6 class="footer-title text-secondary opacity-80">Customer Support</h6> 
            <a href="<?php echo $base_dir; ?>refund_list.php?customer=<?php echo $userid; ?>" class="link link-hover">Refund Requests</a>
            <a href="<?php echo $base_dir; ?>profile.php?customer=<?php echo $userid; ?>" class="link link-hover">Account Details</a>
        </nav>
    </footer>
    <footer class="footer px-10 py-4 border-t bg-base-200 text-base-content border-white/5 flex justify-between items-center">
        <aside class="items-center grid-flow-col">
            <p>&copy; <?php echo date('Y'); ?> ShopSphere. Created for learning & demonstration.</p>
        </aside> 
        <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end text-lg">
            <a class="hover:text-primary transition-colors cursor-pointer"><i class="fa-brands fa-twitter"></i></a> 
            <a class="hover:text-primary transition-colors cursor-pointer"><i class="fa-brands fa-youtube"></i></a> 
            <a class="hover:text-primary transition-colors cursor-pointer"><i class="fa-brands fa-facebook-f"></i></a>
        </nav>
    </footer>
</body>
</html>
